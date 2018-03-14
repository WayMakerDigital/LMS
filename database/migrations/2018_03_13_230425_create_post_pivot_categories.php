<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPivotCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_pivot_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('post_category_id');
            $table->timestamps();Exists('post_pivot_categories');
    }
}

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIf