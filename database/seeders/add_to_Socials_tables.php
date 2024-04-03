<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class add_to_Socials_tables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Social::insert([
            'profile_id' => '1',
            'linkedin' => 'https://www.linkedin.com/in/egit-hernaldi-1b61972b6/',
            'github' => 'https://github.com/egithernaldi',
            'twitter' => '-',
            'instagram' => 'https://www.instagram.com/egithernaldii',
            'gmail' => 'mailto:egithrnld29@gmail.com',
            'whatsapp' => 'https://api.whatsapp.com/send?phone=62852514980760',
        ]);
    }
}
