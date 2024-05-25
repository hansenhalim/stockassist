<?php

namespace Database\Seeders;

use App\Enums\MeasurementUnit;
use App\Enums\OrderCycle;
use App\Enums\ServiceLevel;
use App\Models\Admin;
use App\Models\Ingredient;
use App\Models\Owner;
use App\Models\Recipe;
use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $stores = [
            [
                'owner_phone' => '6282371486542',
                'owner_name' => 'Frans Halim',
                'owner_email' => 'frans_halim@example.com',
                'shop_name' => 'Pempek Semar',
                'address' => 'Jl. Jenderal Sudirman No.120, Tugu Kecil, Kec. Prabumulih Tim., Kota Prabumulih, Sumatera Selatan',
                'zip_code' => '31113',
                'photo_filename' => 'Pempek Semar.jpg',
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

        foreach ($stores as $index => $store) {
            $owner = new Owner(['phone' => $store['owner_phone']]);

            $user = User::factory()->create([
                'name' => $store['owner_name'],
                'email' => $store['owner_email'],
            ]);

            $owner->save();

            $owner->user()->save($user);

            if (array_key_exists('photo_filename', $store)) {
                $path = Storage::putFile('ingredients', storage_path('app/'.$store['photo_filename']));
            }

            $shop = new Shop([
                'name' => $store['shop_name'],
                'address' => $store['address'],
                'zip_code' => $store['zip_code'],
                'photo' => $path,
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

                $path = Storage::putFile('recipes', storage_path('app/Tropical Fruit Juice.webp'));

                $recipe = new Recipe([
                    'name' => 'Tropical Fruit Juice',
                    'description' => 'A refreshing tropical fruit juice blend perfect for hot days. This juice combines the flavors of mango, pineapple, and orange to deliver a vitamin-packed delicious drink.',
                    'photo' => $path,
                ]);

                $recipe->shop()->associate($shop);

                $recipe->save();

                $stocks = [
                    [
                        'name' => 'Mango',
                        'description' => 'Rich in vitamins, minerals, and antioxidants, mango adds a creamy, tropical flavor to any juice.',
                        'unit_of_measure' => MeasurementUnit::GRAM,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Mango.webp',
                        'quantity' => 200,
                    ], [
                        'name' => 'Pineapple',
                        'description' => 'Pineapple is a tropical fruit that provides a tart sweetness and is known for its digestive benefits.',
                        'unit_of_measure' => MeasurementUnit::GRAM,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Pineapple.webp',
                        'quantity' => 300,
                    ], [
                        'name' => 'Orange Juice',
                        'description' => 'Freshly squeezed orange juice to add a tangy zest, boosting the vitamin C content of the drink.',
                        'unit_of_measure' => MeasurementUnit::MILLILITER,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Orange Juice.webp',
                        'quantity' => 250,
                    ], [
                        'name' => 'Ice Cubes',
                        'description' => 'Ice cubes to chill the juice and make it more refreshing.',
                        'unit_of_measure' => MeasurementUnit::GRAM,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Ice Cubes.webp',
                        'quantity' => 100,
                    ], [
                        'name' => 'Mint Leaves',
                        'description' => 'Mint leaves add a fresh, cool aftertaste that complements the sweet and tart flavors of the fruits.',
                        'unit_of_measure' => MeasurementUnit::PIECES,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Mint Leaves.webp',
                        'quantity' => 5,
                    ], [
                        'name' => 'Honey',
                        'description' => 'A natural sweetener to enhance the sweetness of the juice without adding refined sugar.',
                        'unit_of_measure' => MeasurementUnit::GRAM,
                        'service_level' => ServiceLevel::HIGH,
                        'order_cycle' => OrderCycle::WEEKLY,
                        'photo_filename' => 'Honey.webp',
                        'quantity' => 20,
                    ],
                ];

                foreach ($stocks as $stock) {
                    $path = Storage::putFile('ingredients', storage_path('app/'.$stock['photo_filename']));

                    $ingredient = new Ingredient([
                        'name' => $stock['name'],
                        'description' => $stock['description'],
                        'unit_of_measure' => $stock['unit_of_measure'],
                        'service_level' => $stock['service_level'],
                        'order_cycle' => $stock['order_cycle'],
                        'photo' => $path,
                    ]);

                    $ingredient->shop()->associate($shop);

                    $ingredient->save();

                    $recipe->ingredients()->attach($ingredient, ['quantity' => $stock['quantity']]);
                }
            }
        }
    }
}
