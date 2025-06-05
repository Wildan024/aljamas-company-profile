<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create ([
            'name' => 'Aljamas',
            'description' => 'lorem ipsum',
            'logo' => 'aljamas.svg',
            'alamat' => 'Jl. Pajajaran Raya No.44, Bencongan Indah, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15811',
            'email' => 'aljamas@gmail.com',
            'telepon' => '087719853659',
            'maps_embed' => 'maps.com'
        ]);
    }
}
