<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = fake()->password(8);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'adm@tray.com.br',
            'password' => bcrypt($password),
            'remember_token' => $password,
        ]);
    }
}
