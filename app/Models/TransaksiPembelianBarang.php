<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianBarang extends Model
{
    use HasFactory;

    protected $table = "transaksi_pembelian_barang";
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'master_barang_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(TransaksiPembelian::class, 'transaksi_pembelian_id');
    }
}
