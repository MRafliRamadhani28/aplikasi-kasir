<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'nama_barang'  => 'Sabun Batang',
                'harga_satuan' => 3000
            ],
            [
                'nama_barang'  => 'Mi Instan',
                'harga_satuan' => 2000
            ],
            [
                'nama_barang'  => 'Pensil',
                'harga_satuan' => 1000
            ],
            [
                'nama_barang'  => 'Kopi Sachet',
                'harga_satuan' => 1500
            ],
            [
                'nama_barang'  => 'Air Minum Galon',
                'harga_satuan' => 20000
            ]
        ];

        foreach ($datas as $data) {
            Barang::create([
                'nama_barang'  => $data['nama_barang'],
                'harga_satuan' => $data['harga_satuan'],
            ]);
        }
    }
}
