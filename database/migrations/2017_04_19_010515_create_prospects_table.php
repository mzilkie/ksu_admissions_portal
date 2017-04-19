<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('street_address'); 
            $table->string('street_address2');  
            $table->string('city'); 
            $table->string('state');  
            $table->integer('zipcode'); 
            $table->string('country');  
            $table->string('sex'); 
            $table->integer('phone'); 
            $table->date('birthday'); 
            $table->string('email'); 
            $table->string('secondary_school');  
            $table->string('start_semester'); 
            $table->integer('start_year'); 
            $table->integer('college_credit'); 
            $table->string('college_name'); 
            $table->string('primary_major'); 
            $table->string('secondary_major');  
            $table->string('other_interests'); 
            $table->string('hear_about_us');  
            $table->string('other_hear'); 
            $table->string('contact'); 
            $table->timestamps();

            $table->foreign('user_name')
                  ->references('user_name')
                  ->on('users')
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
        Schema::dropIfExists('prospects');
    }
}
