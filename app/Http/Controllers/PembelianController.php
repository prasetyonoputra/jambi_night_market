<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "pembeli") {
            $list_keranjang = DB::table('pembelian')
                ->where('id_pembeli', '=', Auth::user()->id)
                ->get();

            return view('pembelian.index', compact('list_keranjang'));
        } else {
            $list_keranjang = DB::table('pembelian')
                ->join('users', 'pembelian.id_pembeli', '=', 'users.id')
                ->select('pembelian.id', 'pembelian.nama_product', 'pembelian.tanggal_pembelian', 'pembelian.jumlah', 'users.email as email', 'pembelian.status', 'pembelian.total_harga', 'pembelian.jumlah')
                ->get();

            return view('pembelian.index', compact('list_keranjang'));
        }
    }

    public function create()
    {
        return view('information.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_product' => 'required',
            'jumlah' => 'required',
            'id_product' => 'required',
        ]);

        $validatedData["status"] = "Menunggu Pembayaran";
        $validatedData["id_pembeli"] = Auth::user()->id;
        $validatedData["tanggal_pembelian"] = now();

        $product = DB::table('products')
            ->where('id', '=', $validatedData["id_product"])
            ->first();

        $validatedData["total_harga"] = $product->harga * $validatedData["jumlah"];

        Pembelian::create($validatedData);

        return redirect()->route('pembelian.index')
            ->with('success', 'Pembelian berhasil dibuat!');
    }

    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit(Pembelian $pembelian)
    {
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
        ]);

        $pembelian->update($validatedData);

        return redirect()->route('information.index')->with('success', 'Pembelian berhasil diupdate!');
    }

    public function bayar($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $pembelian["status"] = "Dibayar";

        $pembelian->save();

        return redirect('pembelian');
    }

    public function kirim($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $pembelian["status"] = "Dikirim";

        $pembelian->save();

        return redirect('pembelian');
    }

    public function tolak($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $pembelian["status"] = "Ditolak";

        $pembelian->save();

        return redirect('pembelian');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus!');
    }
}
