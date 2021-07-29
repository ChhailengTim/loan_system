<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->tinyInteger('gender')->comment('1: Male, 2: Female');
            $table->date('dob');
            $table->string('address', 200);
            $table->string('email', 100);
            $table->string('password');
            $table->string('phone', 50);
            $table->string('alt_phone', 50);
            $table->string('photo', 20);
            $table->string('national_id_photo', 20);
            $table->string('business_name', 20);
            $table->string('salary_invoice', 20)->comment('Image');
            $table->string('mortgage', 20)->comment('Image');
            $table->string('family_book', 20)->comment('Image');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrower');
    }
}
