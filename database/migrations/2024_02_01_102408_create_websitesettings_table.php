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
        Schema::create('websitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('address_bangla')->nullable();
            $table->text('address_english')->nullable();
            $table->string('phone_bangla')->nullable();
            $table->string('phone_english')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websitesettings');
    }
};
