<?php

namespace Database\Seeders;

// database/seeders/AdminUserSeeder.php
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {
  public function run(): void {
    User::updateOrCreate(
      ['email' => 'admin@example.com'],
      ['name' => 'Admin AP2SC', 'password' => Hash::make('password'), 'role' => 'admin']
    );
  }
}

