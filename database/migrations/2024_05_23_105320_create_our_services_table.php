<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('our_services')) {
            Schema::create('our_services', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('unit')->nullable();
                $table->integer('one_facility')->nullable();
                $table->integer('two_facility')->nullable();
                $table->integer('three_facility')->nullable();
                $table->float('price');
                $table->float('discount_price')->nullable();
                $table->boolean ('course_type')->comment('1=>online, 0=>offline');
                $table->unsignedTinyInteger('status')->default(0)->comment('1=>Active, 0=>Inactive');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_services');
    }
}
