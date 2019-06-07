<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('gender');
			$table->date('date_of_birth')->nullable();
			$table->string('email')->unique();		
			$table->string('mobile')->nullable();
			$table->string('company')->nullable();
			$table->string('position')->nullable();
			$table->string('type')->nullable();
			$table->string('hotline')->nullable();
			$table->string('card')->nullable();
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('postcode')->nullable();
			$table->string('passport_nb')->nullable();
			$table->date('issuance_date')->nullable();
			$table->date('expiry_date')->nullable();
			$table->longText('comment')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
