<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
           $table->increments('pid');
            $table->integer('uid');
            $table->string('name',10);
            $table->integer('money');
            $table->string('mobile',11);
            $table->string('title',50);
            $table->tinyInteger('rate');
            $table->tinyInteger('hrange');
            $table->tinyInteger('status'); // 0审核中,1招标中,2还款中,3结束
            $table->integer('recive');
            $table->integer('pubtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
