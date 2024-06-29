<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->nullable();
            $table->string('class_topic')->nullable();
            $table->integer('subject_id')->nullable(); 
            $table->integer('unit_id')->nullable(); 
            $table->string('video_link')->nullable();
            $table->string('lecture_shit')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('u_classes');
    }
}
