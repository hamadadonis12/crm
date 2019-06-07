<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
			$table->string('name');
			$table->date('from');
			$table->date('to');	

            $table->boolean('has_hotel')->default(0); 
            $table->string('hotel_name')->nullable();

            $table->boolean('has_flight_ticket')->default(0); 
            $table->string('ticket_number')->nullable(); 

            $table->boolean('has_visa')->default(0);    
            $table->boolean('visa_name')->nullable();

            $table->boolean('has_insurance')->default(0);
            $table->boolean('has_tours')->default(0);

            $table->boolean('has_cruise')->default(0);
            $table->string('cruise_name')->nullable();
            
            $table->boolean('has_train')->default(0);
			
			$table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			
            $table->double('price', 8, 2)->default(0);

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
        Schema::dropIfExists('packages');
    }
}
