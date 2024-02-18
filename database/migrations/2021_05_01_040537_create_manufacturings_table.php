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
            $table->foreignId('demand_id');
            $table->foreign('demand_id')->references('id')->on('demands')->onDelete('restrict');
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->integer('quantity');
            $table->foreignId('material_id');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('restrict');
            $table->double('material_quantity', 10, 2);
            $table->foreignId('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('restrict');
            $table->foreignId('workstation_id');
            $table->foreign('workstation_id')->references('id')->on('workstations')->onDelete('restrict');
            $table->date('start_date');
            $table->date('finishing_date');
            $table->date('delivery_date');
            $table->double('total_cost', 10, 2);
            $table->string('status')->default('Waiting for production');
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
