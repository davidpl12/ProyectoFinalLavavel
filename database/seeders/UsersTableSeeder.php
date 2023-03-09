<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' =>'David',
            'apell' =>'Pérez León',
            'address' =>'Priego, 13, Cabra',
            'email' => "davidpl1202@gmail.com",
            'password' => bcrypt('david'),
            'admin' => true
        ]);
    }
}
