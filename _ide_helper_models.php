<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $shop_id
 * @property string $pin
 * @property mixed $password
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authenticable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereShopId($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $shop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereUpdatedAt($value)
 */
	class IncomingInventory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $incoming_inventory_id
 * @property int $ingredient_id
 * @property string $ingredient_name
 * @property string|null $ingredient_barcode
 * @property string|null $ingredient_description
 * @property string|null $ingredient_unit_of_measure
 * @property string|null $ingredient_photo
 * @property int $quantity
 * @property-read \App\Models\IncomingInventory|null $incomingInventory
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIncomingInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientUnitOfMeasure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereQuantity($value)
 */
	class IncomingInventoryItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property string|null $barcode
 * @property string|null $description
 * @property \App\Enums\MeasurementUnit|null $unit_of_measure
 * @property string|null $photo
 * @property int $remaining_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $recipes
 * @property-read int|null $recipes_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereRemainingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereUnitOfMeasure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereUpdatedAt($value)
 */
	class Ingredient extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $ingredient_id
 * @property int $recipe_id
 * @property int $quantity
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe whereRecipeId($value)
 */
	class IngredientRecipe extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $selected_shop_id
 * @property string $phone
 * @property mixed $password
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authenticable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Shop|null $selectedShop
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shop> $shops
 * @property-read int|null $shops_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereSelectedShopId($value)
 */
	class Owner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ingredient> $ingredients
 * @property-read int|null $ingredients_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdatedAt($value)
 */
	class Recipe extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $shop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereUpdatedAt($value)
 */
	class ReleaseOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $release_order_id
 * @property int $recipe_id
 * @property string $recipe_name
 * @property string|null $recipe_photo
 * @property int $quantity
 * @property-read \App\Models\ReleaseOrder|null $releaseOrder
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereRecipeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereRecipePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItem whereReleaseOrderId($value)
 */
	class ReleaseOrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $release_order_item_id
 * @property int $ingredient_id
 * @property string $ingredient_name
 * @property string|null $ingredient_barcode
 * @property string|null $ingredient_description
 * @property string|null $ingredient_unit_of_measure
 * @property string|null $ingredient_photo
 * @property int $quantity
 * @property-read \App\Models\ReleaseOrderItem|null $releaseOrderItem
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientUnitOfMeasure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereReleaseOrderItemId($value)
 */
	class ReleaseOrderItemDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string|null $address
 * @property string|null $zip_code
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ingredient> $ingredients
 * @property-read int|null $ingredients_count
 * @property-read \App\Models\Owner|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $recipes
 * @property-read int|null $recipes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereZipCode($value)
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $authenticable_type
 * @property int|null $authenticable_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authenticable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthenticableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthenticableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

