<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class add_to_Portofolios_tables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portofolio::insert([
            'title' => 'Pelayanan Surat Desa',
            'description' => 'Website Pelayanan Surat Desa menggunakan Framework Laravel dan Bootsrap',
            'image' => '',
            'category' => 'profesional',
            'detail' => '',
            'url' => 'https://github.com/egithernaldi/TA-PelayananDesa-Backend',
        ]);
    }
}
