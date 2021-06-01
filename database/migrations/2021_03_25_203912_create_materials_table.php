<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('vendor_id')->constrained()->restrictOnDelete();
            $table->integer('product_per_kg');
            $table->double('product_price_per_kg');
            $table->double('available_quantity',10 ,2)->default('0.0');
            $table->string('status')->default('Available');
            $table->double('order_quantity', 10, 2);
            $table->date('order_date');
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
        Schema::dropIfExists('materials');
    }
}
