<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        return view('information.index', compact('informations'));
    }

    public function create()
    {
        return view('information.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
        ]);

        Information::create($validatedData);

        return redirect()->route('information.index')
            ->with('success', 'Informasi berhasil dibuat!');
    }

    public function show(Information $information)
    {
        return view('information.show', compact('information'));
    }

    public function edit(Information $information)
    {
        return view('information.edit', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
        ]);

        $information->update($validatedData);

        return redirect()->route('information.index')->with('success', 'Informasi berhasil diupdate!');
    }

    public function destroy(Information $information)
    {
        $information->delete();

        return redirect()->route('information.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
