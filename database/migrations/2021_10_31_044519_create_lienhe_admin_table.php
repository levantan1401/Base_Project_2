<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienheAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhe_admin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_admin');
            $table->string('name');
            $table->string('adress');
            $table->string('phone');
            $table->tinyInteger('trangthai');
            $table->timestamps();
        });
        // Schema::table('slide', function($table) {
        //     //noi bảng
        //      $table->foreign('id_admin')->reference('id')->on('admin');
        //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhe_admin');
    }
}
