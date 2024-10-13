<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rent_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rent_id');
            $table->bigInteger('car_id');
            $table->decimal('penalty')->nullable();
            $table->boolean('status')->default(false);
            $table->decimal('sub_total', 11, 2);
            $table->dateTime('should_be_returned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_details');
    }
};
