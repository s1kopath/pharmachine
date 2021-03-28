<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('address')->nullable();
            $table->string('contact', 20);
            $table->string('gender')->default('unknown');
            $table->string('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('joining_date');
            $table->double('salary', 10, 2);
            $table->double('labour_per_hour', 10, 2);
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
        Schema::dropIfExists('workers');
    }
}
