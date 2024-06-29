<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->integer('unit_id')->nullable(); 
            $table->integer('subject_id')->nullable(); 
            $table->string('payment_method', 25);
            $table->unsignedBigInteger('payment_status')->default(0)->comment('1=>Paid, 0=>Unpaid')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('sender_number')->nullable();
            $table->string('email');
            $table->string('total_amount');
            $table->string('screenshot')->nullable();
            $table->unsignedBigInteger('course_status')->default(0)->comment('1=>Online, 0=>Offline')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
