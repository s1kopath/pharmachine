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
            $table->integer('demand_id');
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->integer('quantity');
            $table->foreignId('material_id')->constrained()->restrictOnDelete();
            $table->double('material_quantity', 10, 2);
            $table->foreignId('worker_id')->constrained()->restrictOnDelete();
            $table->foreignId('workstation_id')->constrained()->restrictOnDelete();
            $table->date('start_date');
            $table->date('finishing_date');
            $table->date('delivery_date');
            $table->double('total_cost',10, 2);
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
