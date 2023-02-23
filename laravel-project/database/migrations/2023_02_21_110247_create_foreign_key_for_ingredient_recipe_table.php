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
        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id')->nullable()->after('id');
            $table->foreign('ingredient_id')->on('ingredients')->references('id');
            $table->unsignedBigInteger('recipe_id')->nullable()->after('ingredient_id');
            $table->foreign('recipe_id')->on('recipes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
