<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBlockFromPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('post_blocks');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('post_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 15)->default('text');
            $table->integer('post_id');
            $table->integer('position');
            $table->mediumText('content')->nullable();
            $table->string("target",255)->nullable();
            $table->timestamps();
        });
    }
}
