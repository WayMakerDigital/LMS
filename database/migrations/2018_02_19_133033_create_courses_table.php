<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('image_name');
            $table->mediumText('image_url');
            $table->decimal('price');
            $table->date('start_date');
            $table->integer('published')->default(0);
            $table->integer('free_course')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
