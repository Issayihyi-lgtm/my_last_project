<?php

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
        Schema::create('food_suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->enum('type',['protein','carbs','fat','mixed']);
            $table->float('calories_per_gram');
            $table->float('protein_per_100g')->nullable();
            $table->float('carbs_per_100g')->nullable();
            $table->float('fat_per_100g')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_suggestions');
    }
};
