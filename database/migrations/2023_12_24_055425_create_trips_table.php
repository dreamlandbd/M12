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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('departure_date');
            $table->time('departure_time');
            $table->foreignId('depature_loc_id')->constrained('locations');
            $table->date('return_date');
            $table->time('return_time');
            $table->foreignId('return_loc_id')->constrained('locations');
            $table->integer('available_seats')->default(36);
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
