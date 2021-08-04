<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerGuarantorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_guarantor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->tinyInteger('gender')->comment('1: Male, 2: Female');
            $table->date('dob');
            $table->string('address', 200);
            $table->string('email', 100);
            $table->string('phone', 50);
            $table->string('alt_phone', 50);
            $table->string('photo', 50);
            $table->string('national_id_photo', 50);
            $table->string('business_name', 20);
            $table->string('salary_invoice', 50)->comment('Image');
            $table->string('mortgage', 50)->comment('Image');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('borrower_id')->references('id')->on('borrower');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrower_guarantor');
    }
}
