<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('subscription_id')->unsigned()->default(0);
            $table->integer('course_id')->unsigned()->default(0);
            $table->decimal('amount_due');
            $table->string('card_no');
            $table->string('payment_ref');
            $table->string('payment_platform');
            $table->boolean('status');
            $table->date('enrollment_date');
            $table->date('expiration_date');
            $table->timestamps();

            

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
