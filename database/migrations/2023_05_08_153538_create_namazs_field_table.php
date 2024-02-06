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
        Schema::create('namazs', function (Blueprint $table) {
            $table->id();
            $table->string('fajr_bangla')->nullable();
            $table->string('fajr_english')->nullable();
            $table->string('johr_bangla')->nullable();
            $table->string('johr_english')->nullable();
            $table->string('asor_bangla')->nullable();
            $table->string('asor_english')->nullable();
            $table->string('magrib_bangla')->nullable();
            $table->string('magrib_english')->nullable();
            $table->string('asha_bangla')->nullable();
            $table->string('asha_english')->nullable();
            $table->string('jummah_bangla')->nullable();
            $table->string('jummah_english')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namazs');
    }
};
