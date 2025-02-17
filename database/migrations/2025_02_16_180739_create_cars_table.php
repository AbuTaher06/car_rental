<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
// database/migrations/xxxx_xx_xx_create_cars_table.php

public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('brand');
        $table->string('model');
        $table->year('year_of_manufacture');
        $table->enum('car_type', ['SUV', 'Sedan', 'Coupe', 'Convertible']);
        $table->decimal('daily_rent_price', 8, 2);
        $table->enum('availability_status', ['Available', 'Not Available']);
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cars');
}

};
