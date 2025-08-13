<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class Journey extends Controller
{
    public function index()
    {
        $data['username'] = session('username');

        $data['listJourney'] = DB::table('BLOG.JOURNEY')->get();
        return view('admin.journeylist_v', $data);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'tag' => 'required|string',
                'deskripsi' => 'required|string',
                'fileimage' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            ], [
                'fileimage.max' => 'Ukuran file maksimal 3MB.',
                'fileimage.mimes' => 'Format file harus jpg, jpeg, atau png.',
                'fileimage.image' => 'File harus berupa gambar.',
            ]);

            $data = [
                'ID' => Str::uuid()->toString(),
                'JUDUL' => $validated['judul'],
                'DETAIL' => $validated['deskripsi'],
                'TAG' => $validated['tag'],
                'DATE' => Carbon::now(),
            ];

            if ($request->hasFile('fileimage')) {
                $file = $request->file('fileimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/perjalanan', $filename);
                $data['IMG'] = $filename;
            }

            DB::table('BLOG.JOURNEY')->insert($data);

            return back()->with('success', 'Journey berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Log::error('Gagal menyimpan Journey: ' . $e->getMessage());
            return back()->withErrors(['Gagal menyimpan data. Silakan coba lagi.']);
        }
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $journey = DB::table('BLOG.JOURNEY')->where('ID', $id)->first();

        if (!$journey) {
            return redirect()->route('journey')->withErrors('Journey tidak ditemukan.');
        }

        // Hapus file gambar jika ada
        if ($journey->IMG) {
            $filePath = storage_path('app/public/perjalanan/' . $journey->IMG);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        DB::table('BLOG.JOURNEY')->where('ID', $id)->delete();

        return redirect()->route('journey')->with('success', 'Journey berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tag' => 'required|string',
            'deskripsi' => 'required|string',
            'fileimage' => 'nullable|file|mimes:jpg,jpeg,png|max:10240', // max 10MB
        ]);

        // Ambil data lama dari database
        $oldData = DB::table('BLOG.JOURNEY')->where('ID', $id)->first();
        if (!$oldData) {
            return redirect()->back()->withErrors(['Journey tidak ditemukan.']);
        }

        $updateData = [
            'JUDUL' => $validated['judul'],
            'TAG' => $validated['tag'],
            'DETAIL' => $validated['deskripsi'],
            'DATE' => Carbon::now()
        ];

        // Cek jika user upload image baru
        if ($request->hasFile('fileimage')) {
            $file = $request->file('fileimage');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/perjalanan', $filename);
            $updateData['IMG'] = $filename;

            // Hapus file lama jika ada
            if ($oldData->IMG && Storage::exists('public/perjalanan/' . $oldData->IMG)) {
                Storage::delete('public/perjalanan/' . $oldData->IMG);
            }
        }

        DB::table('BLOG.JOURNEY')->where('ID', $id)->update($updateData);

        return redirect()->route('journey')->with('success', 'Journey berhasil diperbarui!');
    }

    public function ourJourney()
    {
        $data['listJourney'] = DB::table('BLOG.JOURNEY')->orderBy('DATE', 'desc')->paginate(6);
        return view('ourjourney_v', $data);
    }

    public function getDetail($id)
    {
        $journey = DB::table('BLOG.JOURNEY')->where('ID', $id)->first(); // Assuming you have a Journey model

        if ($journey) {
            return response()->json(['detail' => $journey->DETAIL]); // Return the detail as JSON
        } else {
            return response()->json(['detail' => 'Detail not found'], 404);
        }
    }

    public function getAll(): JsonResponse
    {
        $journeys = DB::table('BLOG.JOURNEY')->get();
        // Return as JSON response
        return response()->json([
            'success' => true,
            'data' => $journeys,
        ]);
    }
}
