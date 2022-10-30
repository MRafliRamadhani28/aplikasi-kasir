<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPembelianBarang;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function addCart(Request $request)
    {
        $cek = TransaksiPembelianBarang::where('master_barang_id', $request->barang_id)->first();
        $cekItem = CartItem::where('master_barang_id', $request->barang_id)->first();
        $cekId = TransaksiPembelian::count();

        if ($cek && $cekItem) {
            CartItem::where('master_barang_id', $request->barang_id)->update(['qty' => $cekItem->qty + 1]);
            TransaksiPembelianBarang::where('master_barang_id', $request->barang_id)->update(['jumlah' => $cek->jumlah + 1]);
        } else {
            $data = [
                'transaksi_pembelian_id' => $cekId + 1,
                'master_barang_id' => $request->barang_id,
                'jumlah'   => 1,
                'harga_satuan' => $request->harga_satuan
            ];
            TransaksiPembelianBarang::create($data);
            $data = [
                'master_barang_id' => $request->barang_id,
                'qty'   => 1,
            ];
            CartItem::create($data);
        }
    }
}
