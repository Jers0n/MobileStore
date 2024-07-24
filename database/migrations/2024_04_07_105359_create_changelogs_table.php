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
        Schema::create('changelogs', function (Blueprint $table) {
            $table->unsignedBigInteger('changelog_id');
            $table->dateTime('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date_last_modified');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('changelogs');
    }
};
