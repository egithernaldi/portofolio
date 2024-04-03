<?php

namespace Database\Seeders;

use App\Models\SectionProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class add_to_Section_Profile_tables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionProfile::insert([
            'name' => 'Egit Hernaldi',
            'phone' => '+62 852 1498 0760',
            'email' => 'egithrnld29@gmail.com',
            'address' => 'Padang',
            'image' => '',
            'description' => 'As an undergraduate Informatic Engineering student at Universitas Negeri Padang, I have around 1 years of industry experience. I love to work and have proficiency in PHP also the framework such as Laravel, but I am also open to exploring other technologies as well. In the industry, I have always believed that I need to do what I love. I enjoy solving problems, creating great things, and making meaningful contributions.',
        ]);
    }
}
