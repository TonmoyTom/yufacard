<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlist', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('card_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('card_name')->nullable();
            $table->text('description')->nullable();
            $table->string('card_code')->nullable();
            $table->string('validity')->nullable();
            $table->string('amount')->nullable();
            $table->string('pin')->nullable();
            $table->string('cvv')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('userlist');
    }
}
