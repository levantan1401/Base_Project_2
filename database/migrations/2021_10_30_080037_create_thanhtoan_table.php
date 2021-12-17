<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('p_id_user');
            $table->integer('p_transaction_id');
            $table->integer('p_transaction_code');
            $table->decimal('p_price',12,4);
            $table->integer('p_note');
            $table->integer('p_code_vppay');
            $table->integer('p_code_bank');
            $table->integer('p_quantity');
            $table->date('p_time');
            $table->string('hinhthuc');
            $table->timestamps();
        });
        // Schema::table('thanhtoan', function($table) {
        //     $table->foreign('id_order')->reference('id')->on('order');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
