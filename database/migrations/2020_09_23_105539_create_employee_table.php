<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->unique();
            $table->date('date_of_birth');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('address');
            $table->string('country');
            $table->mediumText('bio');
            $table->unsignedDecimal('rating');
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
        Schema::dropIfExists('employees');
    }
}
