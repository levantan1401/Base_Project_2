<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoHanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_hanh', function (Blueprint $table) {
            $table->integer('id_baohong')->unsigned();
            $table->integer('id_lichhen')->unsigned();
            $table->text('lydo');
            $table->date('date');
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();

            // $table->foreign('id_baohong')->references('id')->on('bao_hong');
            // $table->foreign('id_lichhen')->references('id')->on('lichhen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bao_hanh');
    }
}
