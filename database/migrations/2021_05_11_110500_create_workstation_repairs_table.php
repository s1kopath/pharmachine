<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkstationRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workstation_repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturing_id');
            $table->foreign('manufacturing_id')->references('id')->on('manufacturings')->onDelete('restrict');
            $table->foreignId('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('restrict');
            $table->foreignId('workstation_id');
            $table->foreign('workstation_id')->references('id')->on('workstations')->onDelete('restrict');
            $table->string('note');
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
        Schema::dropIfExists('workstation_repairs');
    }
}
