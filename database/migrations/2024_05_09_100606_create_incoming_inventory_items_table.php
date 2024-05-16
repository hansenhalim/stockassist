<?php

use App\Enums\MeasurementUnit;
use App\Models\IncomingInventory;
use App\Models\Ingredient;
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
        Schema::create('incoming_inventory_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(IncomingInventory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Ingredient::class)->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('incoming_inventory_items');
    }
};
