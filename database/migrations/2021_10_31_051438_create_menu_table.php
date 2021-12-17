<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu');
            $table->timestamps();

        });
        // Schema::table('baotinhtrang', function($table) {
        //     //noi bảng
        //         $table->foreign('id_title')->reference('id')->on('title');
        //         $table->integer('id_theloai')->reference('id')->on('theloai');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
