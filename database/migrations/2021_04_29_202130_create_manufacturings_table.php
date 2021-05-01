<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturings', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturing_number');
            $table->string('warehouse_number');
            $table->integer('product_id');
            $table->double('quantity');
            $table->integer('material_id');
            $table->double('material_quantity');
            $table->integer('worker_id');
            $table->integer('workstation_id');
            $table->date('start_date');
            $table->date('finishing_date');
            $table->date('delivery_date');
            $table->double('total_cost');
            $table->string('status')->default('Producing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturings');
    }
}
