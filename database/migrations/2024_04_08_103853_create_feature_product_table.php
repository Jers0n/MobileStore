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
        Schema::create('feature_product', function (Blueprint $table) {
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('feature_id');
        
        $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        $table->foreign('feature_id')->references('feature_id')->on('features')->onDelete('cascade');

        
        $table->primary(['product_id', 'feature_id']);

        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_product');
    }
};
