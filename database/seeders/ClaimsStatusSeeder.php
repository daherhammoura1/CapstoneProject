<?php

namespace Database\Seeders;

use App\Models\ClaimStatus;
use COM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaimsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ClaimStatus::create([
            'name' => 'Pending',
            'color' => 'Orange'
        ]);
        ClaimStatus::create([
            'name' => 'Approved',
            'color' => 'green'
        ]);
        ClaimStatus::create([
            'name' => 'Rejected',
            'color' => 'red'
        ]);
    }
}
