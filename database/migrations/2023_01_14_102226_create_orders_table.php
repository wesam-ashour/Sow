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
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('governorate')->nullable();
            $table->integer('city')->nullable();
            $table->integer('block')->nullable();
            $table->string('jadda')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('floor')->nullable();
            $table->date('delivery_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->integer('status')->comment('1-new order / 2-inside the library / ');
            $table->foreignId('assigned_status')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_driver')->nullable()->constrained('users')->cascadeOnDelete();
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
