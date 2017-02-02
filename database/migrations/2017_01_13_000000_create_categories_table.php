<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('permalink', 180)->index();
            $table->boolean('active')->default(0);

            /* ----------------------- START SEO ----------------------- */
            $table->string('meta_title', 70)->nullable();
            $table->string('meta_description', 165)->nullable();
            $table->enum('meta_robots', [
                'index, follow',
                'noindex, follow',
                'index, nofollow',
                'noindex, nofollow',
            ])->nullable()->default('index, follow');
            /* ----------------------- END SEO ----------------------- */

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
        Schema::drop('categories');
    }
}
