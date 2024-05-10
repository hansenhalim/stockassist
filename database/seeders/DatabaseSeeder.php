<?php

namespace Database\Seeders;

use App\Enums\MeasurementUnit;
use App\Models\Admin;
use App\Models\Ingredient;
use App\Models\Owner;
use App\Models\Recipe;
use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $businesses = [
            [
                'owner_phone' => '6282371486542',
                'owner_name' => 'Frans Halim',
                'owner_email' => 'frans_halim@example.com',
                'shop_name' => 'Pempek Semar',
                'address' => 'Jl. Jenderal Sudirman No.120, Tugu Kecil, Kec. Prabumulih Tim., Kota Prabumulih, Sumatera Selatan',
                'zip_code' => '31113',
            ], [
                'owner_phone' => '6289502941231',
                'owner_name' => 'Joshua Indra',
                'owner_email' => 'joshua_indra@example.com',
                'shop_name' => 'Tigalapis',
                'address' => 'Jl. Kepa Listrik No.49 blok bs 49, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta',
                'zip_code' => '11510',
            ], [
                'owner_phone' => '6281513338004',
                'owner_name' => 'Syanty Dewi',
                'owner_email' => 'syanty_dewi@example.com',
                'shop_name' => 'Kedai Choipan Pontianak',
                'address' => 'Jl. Desa Curug Sangereng No.10, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten',
                'zip_code' => '15810',
            ], [
                'owner_phone' => '6287768729775',
                'owner_name' => 'Kenny Halim',
                'owner_email' => 'kenny_halim@example.com',
                'shop_name' => 'KenKen Seafood',
                'address' => 'Jl. Jenderal Sudirman No.12, Gn. Ibul, Kec. Prabumulih Tim., Kota Prabumulih, Sumatera Selatan',
                'zip_code' => '31146',
            ], [
                'owner_phone' => '6289502941231',
                'owner_name' => 'Stanley Tanubrata',
                'owner_email' => 'stanley_tanubrata@example.com',
                'shop_name' => 'Merai',
                'address' => 'Ps. Modern Paramount Serpong, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten',
                'zip_code' => '15810',
            ],
        ];

        foreach ($businesses as $index => $business) {
            $owner = new Owner(['phone' => $business['owner_phone']]);

            $user = User::factory()->create([
                'name' => $business['owner_name'],
                'email' => $business['owner_email'],
            ]);

            $owner->save();

            $owner->user()->save($user);

            $shop = new Shop([
                'name' => $business['shop_name'],
                'address' => $business['address'],
                'zip_code' => $business['zip_code'],
            ]);

            $shop->owner()->associate($owner);

            $shop->save();

            $owner->selectedShop()->associate($shop);

            $owner->save();

            if ($index === 0) {
                $user = User::factory()->create([
                    'name' => 'Hansen Halim',
                    'email' => 'hansen_halim@example.com',
                ]);

                $admin = new Admin(['pin' => '123456']);

                $admin->shop()->associate($shop);

                $admin->save();

                $admin->user()->save($user);

                $recipe = new Recipe(['name' => 'HUMBA']);

                $recipe->shop()->associate($shop);

                $recipe->save();

                $ingredients = [
                    [
                        'name' => 'Vegetable Oil',
                        'description' => '',
                        'quantity' => 15,
                        'unit_of_measure' => MeasurementUnit::MILLILITER,
                    ], [
                        'name' => 'Pork Liempo',
                        'description' => 'Cut into 2" cubes',
                        'quantity' => 550,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Garlic',
                        'description' => 'Minced',
                        'quantity' => 35,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Water',
                        'description' => '',
                        'quantity' => 500,
                        'unit_of_measure' => MeasurementUnit::MILLILITER,
                    ], [
                        'name' => 'Black Peppercorn',
                        'description' => 'Whole',
                        'quantity' => 3,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Star Anise',
                        'description' => '5 pcs',
                        'quantity' => 1,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Bay Leaf',
                        'description' => '4 pcs',
                        'quantity' => 0.2,
                        'unit_of_measure' => MeasurementUnit::PIECES,
                    ], [
                        'name' => 'Bango Kecap Manis',
                        'description' => '',
                        'quantity' => 130,
                        'unit_of_measure' => MeasurementUnit::MILLILITER,
                    ], [
                        'name' => 'Banana Blossoms',
                        'description' => '',
                        'quantity' => 35,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Roasted Reanuts',
                        'description' => 'Skinless',
                        'quantity' => 40,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ], [
                        'name' => 'Cornstarch',
                        'description' => 'Dissolved in 45&nbsp;ml water (also called SLURRY)',
                        'quantity' => 10,
                        'unit_of_measure' => MeasurementUnit::GRAM,
                    ],
                ];

                foreach ($ingredients as $array) {
                    $ingredient = new Ingredient([
                        'name' => $array['name'],
                        'unit_of_measure' => $array['unit_of_measure'],
                    ]);

                    $ingredient->shop()->associate($shop);

                    $ingredient->save();

                    $ingredient->recipes()->attach($recipe, [
                        'quantity' => $array['quantity'],
                        'description' => $array['description'],
                    ]);
                }
            }
        }
    }
}
