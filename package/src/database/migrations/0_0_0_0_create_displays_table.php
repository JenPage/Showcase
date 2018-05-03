<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('showcase.table_prefix').'displays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('component_view');
            $table->string('default_trophy_component_view');
            $table->boolean('force_trophy_default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('showcase.table_prefix').'displays');
    }
}
