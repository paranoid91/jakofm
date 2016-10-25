<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTypesToFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            DB::statement('ALTER TABLE `is_files` MODIFY COLUMN `type` ENUM("image","video","audio")');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            DB::statement('ALTER TABLE `is_files` MODIFY COLUMN `type` ENUM("image","video")');
        });
    }
}
