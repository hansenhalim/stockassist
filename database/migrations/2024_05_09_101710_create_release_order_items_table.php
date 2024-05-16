<?php

use App\Models\Recipe;
use App\Models\ReleaseOrder;
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
        Schema::create('release_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ReleaseOrder::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Recipe::class)->nullable()->constrained()->nullOnDelete();
            $table->string('recipe_name');
            $table->string('recipe_photo')->nullable();
            $table->unsignedBigInteger('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_order_items');
    }
};
