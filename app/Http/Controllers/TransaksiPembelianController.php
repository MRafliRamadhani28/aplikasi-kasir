<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartItem;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPembelianBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiPembelianController extends Controller
{
    public function index()
    {
        return view('transaksi.index',
        [
            'barangs' => Barang::all(),
            'carts' => CartItem::all(),
        ]);
    }

    public function history()
    {
        return view('transaksi.history', [
            'details' => TransaksiPembelian::all(),
        ]);
    }

    public function charge(Request $request)
    {
        $dataTransaction = [
            'total_harga' => $request->total
        ];
        TransaksiPembelian::create($dataTransaction);
        DB::table('cart_items')->delete();
    }

    public function detail()
    {
        return view('transaksi.detail', [
            'details' => TransaksiPembelian::all(),
        ]);
    }

    public function showDetail(Request $request)
    {
        // return TransaksiPembelianBarang::with('transaksi')->where('transaksi_pembelian_id', $request->id)->get();
        return view('transaksi.tbody', [
            'details' => TransaksiPembelian::all(),
            'items' => TransaksiPembelianBarang::with('transaksi')->where('transaksi_pembelian_id', $request->id)->get(),
        ]);
    }
}
