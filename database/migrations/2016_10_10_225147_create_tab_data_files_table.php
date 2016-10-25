<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabDataFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_data_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tab_data_id')->unsigned();
            $table->foreign('tab_data_id')->references('id')->on('tab_data')->onDelete('cascade');
            $table->string('title');
            $table->string('path');
            $table->enum('type', ['audio', 'link', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tab_data_file');
    }
}
