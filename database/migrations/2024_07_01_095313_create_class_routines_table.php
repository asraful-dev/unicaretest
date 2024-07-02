<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit');
            $table->string('subject_id')->nullable();
            $table->string('topics_name')->nullable();
            $table->timestamp('start_time');
            $table->timestamp('end_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('status')->default(0)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('class_routines');
    }
}
