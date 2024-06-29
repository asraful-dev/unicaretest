<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('department')->nullable();
            $table->string('experience')->nullable();
            $table->string('study')->nullable(); // Add this line
            $table->string('whatsapp_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('instructors');
    }
}
