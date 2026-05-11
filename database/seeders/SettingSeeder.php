<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'key' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'key' => 'color',
                'value' => '#000000'
            ],
            [
                'key' => 'site_name',
                'value' => 'Laravel'
            ]
        ]);
    }
}
