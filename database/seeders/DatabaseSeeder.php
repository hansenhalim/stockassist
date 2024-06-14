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
                'photo_filename' => 'Pempek Semar.webp',
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

            $shop = new Shop([
                'name' => $store['shop_name'],
                'address' => $store['address'],
                'zip_code' => $store['zip_code'],
                'photo' => array_key_exists('photo_filename', $store) ? Storage::putFile('shops', storage_path('app/'.$store['photo_filename'])) : null,
            ]);

            $shop->owner()->associate($owner);

            $shop->save();

            $owner->selectedShop()->associate($shop);

            $owner->save();

            if ($index === 0) {
                $user = User::factory()->create([
                    'name' => 'Hansen Halim',
                    'email' => 'hansen_halim@example.com',
                    'photo' => Storage::putFile('users', storage_path('app/Hansen Halim.webp')),
                ]);

                $admin = new Admin(['pin' => '123456']);

                $admin->shop()->associate($shop);

                $admin->save();

                $admin->user()->save($user);

                $recipes = [
                    [
                        'name' => 'Tropical Fruit Juice',
                        'description' => 'A refreshing tropical fruit juice blend perfect for hot days. This juice combines the flavors of mango, pineapple, and orange to deliver a vitamin-packed delicious drink.',
                        'ingredients' => [
                            ['name' => 'Mango', 'description' => 'Rich in vitamins, minerals, and antioxidants, mango adds a creamy, tropical flavor to any juice.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 200],
                            ['name' => 'Pineapple', 'description' => 'Pineapple is a tropical fruit that provides a tart sweetness and is known for its digestive benefits.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 300],
                            ['name' => 'Orange Juice', 'description' => 'Freshly squeezed orange juice to add a tangy zest, boosting the vitamin C content of the drink.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 250],
                            ['name' => 'Ice Cubes', 'description' => 'Ice cubes to chill the juice and make it more refreshing.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Mint Leaves', 'description' => 'Mint leaves add a fresh, cool aftertaste that complements the sweet and tart flavors of the fruits.', 'unit' => MeasurementUnit::PIECES, 'quantity' => 5],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness of the juice without adding refined sugar.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                        ],
                    ],
                    [
                        'name' => 'Berry Blast Smoothie',
                        'description' => 'A delicious and healthy smoothie packed with various berries, perfect for a quick breakfast or a refreshing snack.',
                        'ingredients' => [
                            ['name' => 'Strawberries', 'description' => 'Sweet and juicy strawberries packed with vitamin C and antioxidants.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Blueberries', 'description' => 'Blueberries are rich in antioxidants and add a sweet-tart flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Raspberries', 'description' => 'Raspberries provide a tart flavor and are high in fiber.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Greek Yogurt', 'description' => 'Creamy Greek yogurt adds protein and a rich texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 200],
                            ['name' => 'Almond Milk', 'description' => 'A dairy-free alternative that adds a nutty flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 250],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                        ],
                    ],
                    [
                        'name' => 'Green Detox Juice',
                        'description' => 'A healthy green juice packed with nutrients to help detoxify your body.',
                        'ingredients' => [
                            ['name' => 'Kale', 'description' => 'Kale is a superfood rich in vitamins and minerals.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Spinach', 'description' => 'Spinach is high in iron and adds a mild flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Green Apple', 'description' => 'Green apples add sweetness and tartness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 200],
                            ['name' => 'Cucumber', 'description' => 'Cucumber adds a refreshing and hydrating element.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Lemon Juice', 'description' => 'Lemon juice adds a tangy flavor and vitamin C.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 50],
                            ['name' => 'Ginger', 'description' => 'Ginger adds a spicy kick and has anti-inflammatory properties.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 10],
                        ],
                    ],
                    [
                        'name' => 'Citrus Burst Juice',
                        'description' => 'A refreshing juice bursting with citrus flavors, perfect for a vitamin C boost.',
                        'ingredients' => [
                            ['name' => 'Orange', 'description' => 'Oranges are rich in vitamin C and add a sweet, tangy flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 300],
                            ['name' => 'Grapefruit', 'description' => 'Grapefruit adds a slightly bitter and tart flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 200],
                            ['name' => 'Lime', 'description' => 'Lime adds a sharp, tangy flavor and is high in vitamin C.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 50],
                            ['name' => 'Mint Leaves', 'description' => 'Mint leaves add a fresh, cool aftertaste.', 'unit' => MeasurementUnit::PIECES, 'quantity' => 10],
                            ['name' => 'Ice Cubes', 'description' => 'Ice cubes to chill the juice and make it more refreshing.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Agave Syrup', 'description' => 'A natural sweetener that enhances the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                        ],
                    ],
                    [
                        'name' => 'Protein Power Smoothie',
                        'description' => 'A high-protein smoothie perfect for a post-workout snack or meal replacement.',
                        'ingredients' => [
                            ['name' => 'Banana', 'description' => 'Bananas are a great source of potassium and add a creamy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Peanut Butter', 'description' => 'Peanut butter adds protein and a rich, nutty flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 50],
                            ['name' => 'Protein Powder', 'description' => 'Protein powder boosts the protein content.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 30],
                            ['name' => 'Almond Milk', 'description' => 'A dairy-free alternative that adds a nutty flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 250],
                            ['name' => 'Chia Seeds', 'description' => 'Chia seeds are rich in omega-3 fatty acids and add a crunchy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 10],
                        ],
                    ],
                    [
                        'name' => 'Tropical Green Smoothie',
                        'description' => 'A delicious and nutritious smoothie combining tropical fruits and leafy greens.',
                        'ingredients' => [
                            ['name' => 'Pineapple', 'description' => 'Pineapple is a tropical fruit that provides a tart sweetness and is known for its digestive benefits.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Mango', 'description' => 'Rich in vitamins, minerals, and antioxidants, mango adds a creamy, tropical flavor to any juice.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Spinach', 'description' => 'Spinach is high in iron and adds a mild flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Coconut Water', 'description' => 'Coconut water is hydrating and adds a light, tropical flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 200],
                            ['name' => 'Lime Juice', 'description' => 'Lime juice adds a sharp, tangy flavor and is high in vitamin C.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 30],
                            ['name' => 'Chia Seeds', 'description' => 'Chia seeds are rich in omega-3 fatty acids and add a crunchy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                        ],
                    ],
                    [
                        'name' => 'Berry Green Smoothie',
                        'description' => 'A nutritious smoothie that combines the flavors of berries and leafy greens.',
                        'ingredients' => [
                            ['name' => 'Blueberries', 'description' => 'Blueberries are rich in antioxidants and add a sweet-tart flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Raspberries', 'description' => 'Raspberries provide a tart flavor and are high in fiber.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Kale', 'description' => 'Kale is a superfood rich in vitamins and minerals.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Banana', 'description' => 'Bananas are a great source of potassium and add a creamy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Almond Milk', 'description' => 'A dairy-free alternative that adds a nutty flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 250],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                        ],
                    ],
                    [
                        'name' => 'Tropical Coconut Smoothie',
                        'description' => 'A creamy and delicious smoothie with tropical fruits and coconut.',
                        'ingredients' => [
                            ['name' => 'Pineapple', 'description' => 'Pineapple is a tropical fruit that provides a tart sweetness and is known for its digestive benefits.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Mango', 'description' => 'Rich in vitamins, minerals, and antioxidants, mango adds a creamy, tropical flavor to any juice.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Coconut Milk', 'description' => 'Coconut milk adds a creamy texture and tropical flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 200],
                            ['name' => 'Banana', 'description' => 'Bananas are a great source of potassium and add a creamy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                            ['name' => 'Chia Seeds', 'description' => 'Chia seeds are rich in omega-3 fatty acids and add a crunchy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                        ],
                    ],
                    [
                        'name' => 'Vitamin C Booster Juice',
                        'description' => 'A juice packed with vitamin C from various citrus fruits, perfect for boosting your immune system.',
                        'ingredients' => [
                            ['name' => 'Orange', 'description' => 'Oranges are rich in vitamin C and add a sweet, tangy flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 300],
                            ['name' => 'Grapefruit', 'description' => 'Grapefruit adds a slightly bitter and tart flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 200],
                            ['name' => 'Lemon', 'description' => 'Lemons add a sharp, tangy flavor and are high in vitamin C.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Kiwi', 'description' => 'Kiwi adds a sweet-tart flavor and is high in vitamin C.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Mint Leaves', 'description' => 'Mint leaves add a fresh, cool aftertaste.', 'unit' => MeasurementUnit::PIECES, 'quantity' => 10],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                        ],
                    ],
                    [
                        'name' => 'Chocolate Banana Smoothie',
                        'description' => 'A rich and creamy smoothie combining the flavors of chocolate and banana, perfect for a dessert or a treat.',
                        'ingredients' => [
                            ['name' => 'Banana', 'description' => 'Bananas are a great source of potassium and add a creamy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 150],
                            ['name' => 'Cocoa Powder', 'description' => 'Cocoa powder adds a rich chocolate flavor.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                            ['name' => 'Almond Milk', 'description' => 'A dairy-free alternative that adds a nutty flavor.', 'unit' => MeasurementUnit::MILLILITER, 'quantity' => 250],
                            ['name' => 'Greek Yogurt', 'description' => 'Creamy Greek yogurt adds protein and a rich texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 100],
                            ['name' => 'Honey', 'description' => 'A natural sweetener to enhance the sweetness.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 15],
                            ['name' => 'Chia Seeds', 'description' => 'Chia seeds are rich in omega-3 fatty acids and add a crunchy texture.', 'unit' => MeasurementUnit::GRAM, 'quantity' => 20],
                        ],
                    ],
                ];

                foreach ($recipes as $recipeData) {
                    $recipe = new Recipe([
                        'name' => $recipeData['name'],
                        'description' => $recipeData['description'],
                        'photo' => Storage::putFile('recipes', storage_path('app/'.$recipeData['name'].'.webp')),
                    ]);

                    $recipe->shop()->associate($shop);

                    $recipe->save();

                    foreach ($recipeData['ingredients'] as $ingredientData) {
                        $ingredient = Ingredient::where('name', $ingredientData['name'])->first();

                        if (! $ingredient) {
                            $ingredient = new Ingredient([
                                'name' => $ingredientData['name'],
                                'description' => $ingredientData['description'],
                                'unit_of_measure' => $ingredientData['unit'],
                                'service_level' => ServiceLevel::HIGH,
                                'order_cycle' => OrderCycle::WEEKLY,
                                'photo' => Storage::putFile('ingredients', storage_path('app/'.$ingredientData['name'].'.webp')),
                                'remaining_amount' => 10000,
                            ]);

                            $ingredient->shop()->associate($shop);
                            $ingredient->save();
                        }

                        $recipe->ingredients()->attach($ingredient, ['quantity' => $ingredientData['quantity']]);

                    }
                }
            }
        }
    }
}
