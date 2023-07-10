<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>"Rangga",
            'role'=>'masyarakat',
            "email"=>"Rangga@gmail.com",
            "password"=>bcrypt("12345")
        ]);

        DB::table('users')->insert([
            'name'=>"Pregorian",
            'role'=>'admin',
            "email"=>"Pregorian@gmail.com",
            "password"=>bcrypt("12345")
        ]);


    }
}
