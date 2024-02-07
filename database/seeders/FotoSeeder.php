<?php

namespace Database\Seeders;

use App\Models\Foto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Foto::create([
            'FotoID' => '200004232020111001',
            'JudulFoto' => 'Sunghoon.jpeg',
            'DeskripsiFoto' => 'Lee Jeno',
            'working_period' => '1',
            'gender' => 'Male',
            'address' => 'Korea',
        ]);
    }
}
