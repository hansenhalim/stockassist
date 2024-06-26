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
 * @property string|null $pin
 * @property mixed $password
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Shop $shop
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
 * @property \Illuminate\Support\Carbon|null $expected_at
 * @property \Illuminate\Support\Carbon|null $fulfilled_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingInventoryItem> $incomingInventoryItems
 * @property-read int|null $incoming_inventory_items_count
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereExpectedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventory whereFulfilledAt($value)
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
 * @property int|null $ingredient_id
 * @property int $quantity
 * @property string|null $ingredient_name
 * @property string|null $ingredient_barcode
 * @property string|null $ingredient_description
 * @property string|null $ingredient_unit_of_measure
 * @property string|null $ingredient_photo
 * @property string|null $ingredient_service_level
 * @property string|null $ingredient_order_cycle
 * @property-read \App\Models\IncomingInventory $incomingInventory
 * @property-read \App\Models\Ingredient|null $ingredient
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIncomingInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientOrderCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingInventoryItem whereIngredientServiceLevel($value)
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
 * @property \App\Enums\MeasurementUnit $unit_of_measure
 * @property string|null $photo
 * @property \App\Enums\ServiceLevel $service_level
 * @property \App\Enums\OrderCycle $order_cycle
 * @property int $remaining_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $lead_time_avg
 * @property float|null $lead_time_min
 * @property float|null $lead_time_sig
 * @property float|null $demand_avg
 * @property float|null $demand_min
 * @property int|null $reorder_point
 * @property int|null $safety_stock
 * @property int|null $inventory_level_max
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingInventoryItem> $incomingInventoryItems
 * @property-read int|null $incoming_inventory_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $recipes
 * @property-read int|null $recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReleaseOrderItemDetail> $releaseOrderItemDetails
 * @property-read int|null $release_order_item_details_count
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereDemandAvg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereDemandMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereInventoryLevelMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereLeadTimeAvg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereLeadTimeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereLeadTimeSig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereOrderCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereRemainingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereReorderPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereSafetyStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredient whereServiceLevel($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngredientRecipe query()
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
 * @property string|null $phone
 * @property mixed $password
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Shop|null $selectedShop
 * @property-read \App\Models\Shop|null $shop
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
 * @property string|null $description
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ingredient> $ingredients
 * @property-read int|null $ingredients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReleaseOrderItem> $releaseOrderItems
 * @property-read int|null $release_order_items_count
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereDescription($value)
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
 * @property \Illuminate\Support\Carbon|null $finalized_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReleaseOrderItem> $releaseOrderItems
 * @property-read int|null $release_order_items_count
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrder whereFinalizedAt($value)
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
 * @property int|null $recipe_id
 * @property int $quantity
 * @property string|null $recipe_name
 * @property string|null $recipe_photo
 * @property-read \App\Models\Recipe|null $recipe
 * @property-read \App\Models\ReleaseOrder $releaseOrder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReleaseOrderItemDetail> $releaseOrderItemDetails
 * @property-read int|null $release_order_item_details_count
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
 * @property int|null $ingredient_id
 * @property int $quantity
 * @property string|null $ingredient_name
 * @property string|null $ingredient_barcode
 * @property string|null $ingredient_description
 * @property string|null $ingredient_unit_of_measure
 * @property string|null $ingredient_photo
 * @property string|null $ingredient_service_level
 * @property string|null $ingredient_order_cycle
 * @property-read \App\Models\Ingredient|null $ingredient
 * @property-read \App\Models\ReleaseOrderItem $releaseOrderItem
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientOrderCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReleaseOrderItemDetail whereIngredientServiceLevel($value)
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin> $admins
 * @property-read int|null $admins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingInventory> $incomingInventories
 * @property-read int|null $incoming_inventories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ingredient> $ingredients
 * @property-read int|null $ingredients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Owner $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $recipes
 * @property-read int|null $recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReleaseOrder> $releaseOrders
 * @property-read int|null $release_orders_count
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
 * @property string|null $authable_type
 * @property int|null $authable_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authable
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

