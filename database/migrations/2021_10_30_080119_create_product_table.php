<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('status');
            $table->decimal('price',12,4);
            $table->integer('sale_price');
            $table->string('image');
            $table->text('list_image');
            $table->string('color');
            $table->integer('category_id')->unsigned();
            $table->text('content');
            $table->integer('quantity')->nullable();
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('category');

        });
        // Schema::table('product', function($table) {
        //      $table->foreign('id_theloai')->reference('id')->on('category');
        //      $table->foreign('id_thongsokt')->reference('id')->on('thongsokithuat');
        //      $table->foreign('id_mota')->reference('id')->on('mota');
        //     //  $table->foreign('id_theloai')->reference('id')->on('theloai');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
