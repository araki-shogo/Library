<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //貸し出しテーブル
    public function up()
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->timestamp('lent_date'); //貸し出し日
            $table->timestamp('return_date')->nullable(); //返却日
            $table->boolean('status'); //0:未貸出、1:貸し出し

            $table->foreign('user_id') //user_idカラムを外部キーとする
                ->references('id')      //Usersテーブルのidカラムが主キー
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lendings');
    }
}
