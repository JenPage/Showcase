<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayTrophyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('showcase.table_prefix', 'showcase_').'display_trophy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('display_id');
            $table->integer('trophy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('showcase.table_prefix', 'showcase_').'display_trophy');
    }
}
