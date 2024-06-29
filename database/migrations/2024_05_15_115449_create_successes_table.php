<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('successes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('total_student')->nullable();
            $table->string('chance_student')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('successes');
    }
}
