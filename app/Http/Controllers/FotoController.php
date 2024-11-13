<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with(['galery.post'])->paginate(10);
        $galeris = Galery::with('post')->get();
        return view('admin.foto.index', compact('fotos', 'galeris'));
    }

    public function create()
    {
        $galeris = Galery::with('post')->get();
        $posts = Post::all();
        return view('admin.foto.create', compact('galeris', 'posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file ke storage/app/public/uploads
            $path = $file->storeAs('uploads', $filename, 'public');

            Foto::create([
                'galery_id' => $request->galery_id,
                'file' => $path,
                'judul' => $request->judul
            ]);

            return redirect()->route('foto.index')->with('success', 'Foto berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal mengupload file');
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $galeris = Galery::with('post')->get();
        $posts = Post::all();
        return view('admin.foto.edit', compact('foto', 'galeris', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string'
        ]);

        $foto = Foto::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::disk('public')->delete($foto->file);
            
            // Upload file baru
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            
            $foto->file = $path;
        }

        $foto->galery_id = $request->galery_id;
        $foto->judul = $request->judul;
        $foto->save();

        return redirect()->route('foto.index')->with('success', 'Foto berhasil diupdate');
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        // Hapus file dari storage
        Storage::disk('public')->delete($foto->file);
        $foto->delete();
        return redirect()->route('foto.index')->with('success', 'Foto berhasil dihapus');
    }
} 