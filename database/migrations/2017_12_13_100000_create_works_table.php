<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->string('name', 150);
            $table->string('permalink', 200)->unique();
            $table->string('image')->default('no-image.jpg');
            $table->string('image_alt')->nullable();
            $table->string('description', 165)->nullable();
            $table->boolean('active')->default(0);

            /* -------------------- START SEO -------------------- */
            $table->string('meta_title', 70);
            $table->string('meta_description', 165);
            $table->enum('meta_robots', [
                'index, follow',
                'index, nofollow',
                'noindex, follow',
                'noindex, nofollow'
            ]);
            /* -------------------- END SEO -------------------- */

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
        Schema::drop('works');
    }
}
