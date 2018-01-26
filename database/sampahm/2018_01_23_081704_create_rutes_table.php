<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('depart_at');
            $table->string('rute_from',255);
            $table->string('rute_to',255);
            $table->integer('harga');
            $table->integer('transport_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('rutes',function($table){
            $table->foreign('transport_id')->references('id')->on('transportations')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutes');
    }
}
