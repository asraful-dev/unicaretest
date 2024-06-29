<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeritoriousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meritoriouses', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('admission_exam')->nullable();
            $table->string('achieve_place')->nullable();
            $table->text('comment_of_meritorious')->nullable();
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
        Schema::dropIfExists('meritoriouses');
    }
}
