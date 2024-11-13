<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil galeri dengan status aktif dan semua foto terkait
        $galleries = Galery::with(['fotos', 'post'])
            ->where('status', 1)
            ->orderBy('position', 'asc')
            ->take(6)  // Ambil 6 galeri teratas
            ->get();
        
        // Ambil posts terbaru dengan galeri dan foto
        $latestNewsPosts = Post::with(['galery.fotos'])
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();
        
        return view('landing-page', compact('galleries', 'latestNewsPosts'));
    }
} 