<?php

use App\Enums\MeasurementUnit;
use App\Enums\OrderCycle;
use App\Enums\ServiceLevel;
use App\Models\Shop;
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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('barcode')->nullable();
            $table->string('description')->nullable();
            $table->enum('unit_of_measure', MeasurementUnit::values());
            $table->string('photo')->nullable();
            $table->enum('service_level', ServiceLevel::values());
            $table->enum('order_cycle', OrderCycle::values());
            $table->unsignedBigInteger('remaining_amount')->default(0);
            $table->timestamps();

            $table->float('lead_time_avg')->nullable();
            $table->float('lead_time_min')->nullable();
            $table->float('lead_time_sig')->nullable(); //standard deviation(sigma)
            $table->float('demand_avg')->nullable();
            $table->float('demand_min')->nullable();

            $table->unsignedBigInteger('safety_stock')->nullable();
            $table->unsignedBigInteger('reorder_point')->nullable();
            $table->unsignedBigInteger('order_quantity')->nullable();
            $table->unsignedBigInteger('inventory_level_max')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
