<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $arrays = [
            [
                'owner_phone' => '6282371486542',
                'owner_name' => 'Frans Halim',
                'owner_email' => 'frans_halim@gmail.com',
                'shop_name' => 'Pempek Semar',
                'address' => 'Jl. Jenderal Sudirman No.120, Tugu Kecil, Kec. Prabumulih Tim., Kota Prabumulih, Sumatera Selatan',
                'zip_code' => '31113',
            ], [
                'owner_phone' => '6289502941231',
                'owner_name' => 'Joshua Indra',
                'owner_email' => 'joshua_indra@gmail.com',
                'shop_name' => 'Tigalapis',
                'address' => 'Jl. Kepa Listrik No.49 blok bs 49, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta',
                'zip_code' => '11510',
            ], [
                'owner_phone' => '6281513338004',
                'owner_name' => 'Syanty Dewi',
                'owner_email' => 'syanty_dewi@gmail.com',
                'shop_name' => 'Kedai Choipan Pontianak',
                'address' => 'Jl. Desa Curug Sangereng No.10, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten',
                'zip_code' => '15810',
            ], [
                'owner_phone' => '6287768729775',
                'owner_name' => 'Kenny Halim',
                'owner_email' => 'kenny_halim@gmail.com',
                'shop_name' => 'KenKen Seafood',
                'address' => 'Jl. Jenderal Sudirman No.12, Gn. Ibul, Kec. Prabumulih Tim., Kota Prabumulih, Sumatera Selatan',
                'zip_code' => '31146',
            ], [
                'owner_phone' => '6289502941231',
                'owner_name' => 'Stanley Tanubrata',
                'owner_email' => 'stanley_tanubrata@gmail.com',
                'shop_name' => 'Merai',
                'address' => 'Ps. Modern Paramount Serpong, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten',
                'zip_code' => '15810',
            ],
        ];

        foreach ($arrays as $array) {
            $owner = new Owner(['phone' => $array['owner_phone']]);

            $user = User::factory()->create([
                'name' => $array['owner_name'],
                'email' => $array['owner_email'],
            ]);

            $owner->user()->associate($user);

            $owner->save();

            $shop = new Shop([
                'name' => $array['shop_name'],
                'address' => $array['address'],
                'zip_code' => $array['zip_code'],
            ]);

            $shop->owner()->associate($owner);

            $shop->save();
        }
    }
}
