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
    Schema::create('deceaseds', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('id_number')->nullable();
        $table->string('lot_number');
        $table->string('tpi')->nullable();
        $table->date('date_of_death')->nullable();
        $table->float('x_coordinate'); // For Leaflet map X
        $table->float('y_coordinate'); // For Leaflet map Y
        $table->text('additional_notes')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceaseds');
    }
};
