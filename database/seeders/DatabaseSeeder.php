<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Department::factory()->create([
            'name' => 'Financeiro'
        ]);

        Department::factory()->create([
            'name' => 'Desenvolvimento'
        ]);

        Department::factory()->create([
            'name' => 'Vendas'
        ]);

        Department::factory()->create([
            'name' => 'Marketing'
        ]);

        Department::factory()->create([
            'name' => 'Atendimento'
        ]);
    }
}
