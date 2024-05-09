<?php

use App\Enums\MeasurementUnit;
use App\Models\Ingredient;
use App\Models\ReleaseOrderItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('release_order_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ReleaseOrderItem::class);
            $table->foreignIdFor(Ingredient::class);
            $table->string('ingredient_name');
            $table->string('ingredient_barcode')->nullable();
            $table->string('ingredient_description')->nullable();
            $table->enum('ingredient_unit_of_measure', MeasurementUnit::values())->nullable();
            $table->string('ingredient_photo')->nullable();
            $table->unsignedBigInteger('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_order_item_details');
    }
};
