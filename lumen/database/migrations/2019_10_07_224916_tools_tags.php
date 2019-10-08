<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ToolsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_tags', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('tools_id')->unsigned()->index();
            $table->bigInteger('tags_id')->unsigned()->index();
            $table->foreign('tools_id')
                ->references('id')
                ->on('tools')
                ->onDelete('cascade');
            $table->foreign('tags_id')
                ->references('id')
                ->on('tags');
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
        Schema::drop('tools_tags');
    }
}
