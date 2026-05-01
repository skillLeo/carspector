<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('desc')->nullable();
            $table->string('account_name')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_title')->nullable();
            $table->string('iban')->nullable();
            $table->enum('payment_type',['Bank','Paypal','Stripe','Admin'])->nullable();
            $table->enum('type',['Withdraw','Deposit','Adjusted'])->nullable();
            $table->double('amount')->nullable();
            $table->enum('status',['Pending','Completed','Canceled'])->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
