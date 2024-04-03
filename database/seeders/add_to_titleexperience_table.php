<?php

namespace Database\Seeders;

use App\Models\Titleexperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class add_to_titleexperience_table extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Titleexperience::insert([
            'title' => 'Work Experience'
        ]);
        Titleexperience::insert([
            'title' => 'Education'
        ]);
        Titleexperience::insert([
            'title' => 'Organisational Experience'
        ]);
    }
}
