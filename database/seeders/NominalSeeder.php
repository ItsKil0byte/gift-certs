<?php

namespace Database\Seeders;

use App\Models\Nominal;

use Illuminate\Database\Seeder;

class NominalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nominal::insert([
            [
                'value' => 1000,
                'is_active' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ],
            [
                'value' => 2000,
                'is_active' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ],
            [
                'value' => 5000,
                'is_active' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ],
            [
                'value' => 10000,
                'is_active' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ]
        ]);
    }
}
