<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('units')) {
           
                Schema::create('units', function (Blueprint $table) {
                    $table->id();
                    $table->string('unit_name')->nullable();
                    $table->string('unit_image');
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
        Schema::dropIfExists('units');
    }
}
