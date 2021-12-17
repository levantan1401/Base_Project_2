<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongsokithuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongsokithuat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');
            $table->string('dai_rong_cao')->nullable();
            $table->string('dongCo')->nullable();
            $table->string('chieuDaiCS')->nullable();
            $table->string('khoangSangGam')->nullable();
            $table->string('dungTichNL')->nullable();
            $table->string('mucTieuThuNL')->nullable();
            $table->string('congSuatMax')->nullable();
            $table->string('moMemXoan')->nullable();
            $table->string('hopSo')->nullable();
            $table->string('danDong')->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('thongsokithuat');
    }
}
