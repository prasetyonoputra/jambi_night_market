<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UmkmController extends Controller
{
    public function index()
    {
        $list_umkm = DB::table('umkm')
            ->join('users', 'umkm.pemilik', '=', 'users.id')
            ->select('umkm.id', 'umkm.nama_umkm', 'umkm.alamat', 'umkm.deskripsi', 'users.name as pemilik', 'umkm.email', 'umkm.status', 'umkm.no_telp')
            ->get();

        return view('umkm.index', compact('list_umkm'));
    }

    public function create()
    {
        $umkm = Umkm::get()->where("pemilik", Auth::id());

        return view('umkm.create', compact('umkm'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'deskripsi' => 'required',
            'email' => 'required',
        ]);

        $validatedData['pemilik'] = Auth::id();
        $validatedData['status'] = "Belum Diverivikasi";

        Umkm::create($validatedData);

        return redirect()->route('home')
            ->with('success', 'Informasi berhasil dibuat!');
    }

    public function edit(Umkm $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'email' => 'required',
        ]);

        if (Auth::user()->role == "admin") {
            $validatedData["status"] = $request->status;
            $umkm->update($validatedData);
            return redirect()->route('umkm.index')->with('success', 'Informasi berhasil diupdate!');
        } else {
            $validatedData["status"] = "Belum Terverifikasi";
            $umkm->update($validatedData);
            return redirect()->route('umkm.create')->with('success', 'Informasi berhasil diupdate!');

        }
    }

    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect()->route('umkm.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
