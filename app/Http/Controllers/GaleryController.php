<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeris = Galery::with(['post', 'fotos'])->paginate(10);
        $posts = Post::all();
        return view('admin.galeri.index', compact('galeris', 'posts'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('admin.galeri.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer'
        ]);

        Galery::create($request->all());
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galery = Galery::findOrFail($id);
        $posts = Post::all();
        return view('admin.galeri.edit', compact('galery', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer'
        ]);

        $galery = Galery::findOrFail($id);
        $galery->update($request->all());
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        $galery->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
} 