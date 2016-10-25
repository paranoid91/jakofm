<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tab_id')->unsigned();
            $table->foreign('tab_id')->references('id')->on('tabs')->onDelete('cascade');
            $table->integer('lang_id')->unsigned()->index();
            $table->char("lang",2);
            $table->string('title');
            $table->string('icon');
            $table->mediumText('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tab_data');
    }
}
