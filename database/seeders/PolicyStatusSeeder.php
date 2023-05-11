<?php

namespace Database\Seeders;

use App\Models\PolicyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PolicyStatus::create([
            'name' => 'Active',
            'color' => '#0000FF'
        ]);
        PolicyStatus::create([
            'name' => 'Inactive',
            'color' => '#FF0000'
        ]);
    }
}
