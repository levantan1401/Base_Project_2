<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopdongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopdong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_createHDPerson');
            $table->text('dieukhoan');
            $table->date('date');
            $table->decimal('price',12,4);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();
            
            // $table->foreign('id_user')->reference('id')->on('users');
            // $table->foreign('id_createHDPerson')->reference('id')->on('admin');
            // $table->engine = 'InnoDB';
            //
            // $table->foreign('id')
            // ->references('id_user')->on('users')
            // ->onDelete('cascade');
        });
        // Schema::table('hopdong', function($table) {
        //     $table->foreign('id_user')->reference('id')->on('users');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hopdong');
    }
}
