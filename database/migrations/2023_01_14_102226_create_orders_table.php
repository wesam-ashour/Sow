<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('governorate');
            $table->integer('city');
            $table->integer('block');
            $table->string('jadda');
            $table->string('street');
            $table->string('house');
            $table->string('floor');
            $table->integer('status')->comment('1-new order / 2-inside the library');
            $table->integer('payment_status')->default('1')->comment('1-no payment / 2-success / 3-failed');
            $table->date('date_payment')->nullable();
            $table->text('TrackID')->nullable();
            $table->text('PaymentID')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
