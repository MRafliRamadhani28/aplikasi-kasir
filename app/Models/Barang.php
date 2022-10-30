<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "master_barang";
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasMany(TransaksiPembelianBarang::class);
    }

    public function cart()
    {
        return $this->hasMany(CartItem::class);
    }
}
