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
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('contact', 20);
            $table->string('gender')->default('unknown');
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('joining_date')->nullable();
            $table->double('salary', 10, 2)->default('5000');
            $table->double('labour_per_hour', 10, 2);
            $table->string('image')->nullable();
            $table->string('status')->default('Available');
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
