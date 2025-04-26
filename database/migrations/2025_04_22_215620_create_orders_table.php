<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_account')->nullable(); // hoặc là tài khoản hệ thống/username
            $table->date('date')->nullable();
            $table->integer('amount');
            $table->string('bank_code')->nullable();
            $table->string('bank_tran_no')->nullable();
            $table->string('card_type')->nullable();
            $table->string('order_info')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('transaction_no')->nullable();
            $table->string('txn_ref')->nullable();
            $table->string('secure_hash')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
