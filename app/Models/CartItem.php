<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function barangCart()
    {
        return $this->belongsTo(Barang::class, 'master_barang_id');
    }
}
