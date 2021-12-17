<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->date('or_date')->nullable();
            $table->string('or_note')->nullable();
            $table->integer('userID');
            $table->tinyInteger('status')->default('0');
            $table->string('tinhtrang')->nullable();
            $table->timestamps();

        });
        // Schema::table('order', function($table) {
        // $table->foreign('id')->reference('id_user')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
