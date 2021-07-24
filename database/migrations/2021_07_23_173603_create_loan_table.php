<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id');
            $table->decimal('request_amount', 6, 2);
            $table->integer('term');
            $table->decimal('outstanding_amount', 6, 2);
            $table->dateTime('appointment_date')->nullable();
            $table->string('status')->default('Pending')->comment('Pending, Approved, Rejected');
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
        Schema::dropIfExists('loan');
    }
}
