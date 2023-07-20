<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('events')->insert([
            'nama_event'=>'Dewa19',
            'id_kategori'=>'1',
            'gambar_event'=>'image/dewa19.jpg',
            'tgl_event'=>'2023-01-01',
            'deskripsi_event'=>'Konser Dewa 19',
            'lokasi_event'=>'Wonokromo',
            'harga_event'=>'200000',
            'kuota_event'=>'100'

        ]);
    }
}
