<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_admin');
            $table->string('images');
            $table->string('ten');
            $table->string('noi_dung');
            $table->tinyInteger('trangthai')->nullable()->default(1);
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
        Schema::dropIfExists('slide');
    }
}
