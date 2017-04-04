<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_id')->nullable()->unsigned();
            $table->foreign('work_id')
                ->references('id')
                ->on('works')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('alt');

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
        Schema::drop('work_images');
    }
}
