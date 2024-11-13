<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::paginate(10);
        return view('admin.manajemen-admin.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.manajemen-admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required|min:6'
        ]);

        Petugas::create([
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.manajemen-admin.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        
        $request->validate([
            'username' => 'required|unique:petugas,username,'.$id,
            'password' => 'nullable|min:6'
        ]);

        $petugas->username = $request->username;
        if ($request->password) {
            $petugas->password = $request->password;
        }
        $petugas->save();

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil diupdate');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil dihapus');
    }
} 