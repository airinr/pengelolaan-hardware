<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LabolatoriumSeeder extends Seeder
{
    public function run(): void
    {
        Lab::updateOrCreate(
            ['nama_lab' => 'LAB-609'],
            ['tanggal' => Carbon::today()] 
        );

        Lab::updateOrCreate(
            ['nama_lab' => 'LAB-610'],
            ['tanggal' => Carbon::today()]
        );
    }
}
