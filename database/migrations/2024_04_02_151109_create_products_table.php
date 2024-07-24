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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name');
            $table->string('slug');
            $table->string('product_model');
            $table->string('manufacturer');
            $table->string('short_description');
            $table->text('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('SKU');
            $table->enum('stock_status',["instock","outofstock"]);
            $table->unsignedInteger('stock_on_hand')->default(1);
            $table->boolean('featured')->default(false);
            $table->string('image');
            $table->text('images');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('feature_id');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
            $table->foreign('feature_id')->references('feature_id')->on('features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
