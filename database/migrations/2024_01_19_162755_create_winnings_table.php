<?php

use App\Models\winnings;
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
        Schema::create('winnings', function (Blueprint $table) {
            $table->primary(['user_id', 'brand_id', 'part_id']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('brand_id')->references('brand_id')->on('brands');
            $table->foreignId('part_id')->references('part_id')->on('parts');
            $table->foreignId('product_id')->references('product_id')->on('products');
            $table->date('date');
            $table->timestamps();
        });

        winnings::create(['user_id' => 1, 'brand_id' => 1, 'part_id' => 1, 'product_id' => 1, 'date' => '2023-12-12']);
        winnings::create(['user_id' => 2, 'brand_id' => 2, 'part_id' => 2, 'product_id' => 2, 'date' => '2023-12-13']);
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winnings');
    }
};
