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
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('feature_id');
            $table->decimal('weight', 10, 2);
            $table->string('dimensions');
            $table->string('OS');
            $table->decimal('screensize', 10, 2);
            $table->string('resolution');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('storage');
            $table->integer('battery');
            $table->string('rear_camera');
            $table->string('front_camera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
