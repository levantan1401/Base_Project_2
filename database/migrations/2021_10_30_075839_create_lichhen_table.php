<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_admin')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('date');
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();
            
            $table->foreign('id_admin')->references('id')->on('admin');
            $table->foreign('id_user')->references('id')->on('users');

            
        });
        // Schema::table('lichhen', function($table) {
        // $table->foreign('id')->reference('id_user')->on('users');
        // $table->foreign('id_admin')->reference('id')->on('admin');
        //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichhen');
    }
}
