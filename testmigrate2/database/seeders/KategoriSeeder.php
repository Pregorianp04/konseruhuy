<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('kategoris')->insert([
        'nama_kategori'=>'silver'
       ]);

       DB::table('kategoris')->insert([
        'nama_kategori'=>'gold'
       ]);
       DB::table('kategoris')->insert([
        'nama_kategori'=>'platinum'
       ]);
    }
}
