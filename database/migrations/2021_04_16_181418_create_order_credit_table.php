<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_credit', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('card_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('contact_no')->nullable();
            $table->string('further_info')->nullable();
            $table->string('payment_method_name');
            $table->text('transaction_details');
            $table->string('amount')->nullable();
            $table->string('amount_with_vat')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order_credit');
    }
}
