<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class add_to_experience_tables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::insert([
            'position' => 'Customer Database Support',
            'from' => '2020-01-20',
            'to' => '2020-07-20',
            'place' => 'Magenta Pegadaian - Purwokerto Selatan, Kabupaten Banyumas, Jawa Tengah',
            'about'=> 'Internship program held by the Kampus Merdeka and Magenta Pegadaian',
            'description' => '> Managing and Processing customer databases to be used for company needs such as marketing, etc  
            > Familiar with database management app such as Ms Access and Excel, SQL and other database languages  
            > Successfully created and implemented a web-based inventory management system using QR Code as the final project',
            'id_experience' => '1',

        ]);
        Experience::insert([
            'position' => 'Student',
            'from' => '2021-06-16',
            'to' => '2024-02-24',
            'place' => 'Universitas Negeri Padang - Padang , Sumatera Barat',
            'about'=> 'Informatic Engineering',
            'description' => '> Students Active in Campus', 
            'id_experience' => '2',
        ]);
        Experience::insert([
            'position' => 'Student',
            'from' => '2018-06-01',
            'to' => '2021-04-30',
            'place' => 'SMA N 1 Batang Anai - Padang Pariaman, Sumatera Barat, Indonesia',
            'about'=> 'High School Diploma of IPA',
            'description' => '> Students active in school and have Successfully graduate on time
            > Participate in several school organisations both official and non-official', 
            'id_experience' => '2',

        ]);
        Experience::insert([
            'position' => 'Member Organisasi Siswa Intra Sekolah (OSIS) - Padang Pariaman, Indonesia',
            'from' => '2019-12-06',
            'to' => '2020-12-01',
            'place' => 'SMA N 1 Batang Anai - Padang Pariaman, Sumatera Barat, Indonesia',
            'about'=> 'Staff members of the Students council',
            'description' => '> Actively participate in several programs held by the school student council as Members and Staff of the Arts Division
            > Successfully complete an yearly work program, one of which is like holding an event called  Randai  as Co Leader', 
            'id_experience' => '3',
        ]);
    }
}
