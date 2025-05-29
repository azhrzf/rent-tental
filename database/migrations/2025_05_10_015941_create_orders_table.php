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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('identity_number')->unique();
            $table->date('order_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('payment_confirmed_date')->nullable();
            $table->date('expected_return_date')->nullable();
            $table->date('actual_return_date')->nullable();
            $table->enum('status', ['paid', 'unpaid', 'need_confirmation', 'returned'])->default('unpaid');
            $table->string('payment_proof')->nullable();
            $table->text('description')->nullable();
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
