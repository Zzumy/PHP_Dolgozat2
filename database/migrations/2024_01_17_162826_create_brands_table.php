<?php

use App\Models\brands;
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
        Schema::create('brands', function (Blueprint $table) {
            $table->id('brand_id');
            $table->string('name');
            $table->string('country');
            $table->timestamps();
        });

        brands::create(['brand_id' => 1, 'name' => 'Szortelen Kft.', 'country' => 'Afrika']);
        brands::create(['brand_id' => 2, 'name' => 'Tiszta Legzes Kft.', 'country' => 'Madagaszkár']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
