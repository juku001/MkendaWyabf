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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->string('ref_id')->unique();
            $table->string('txn_id')->unique()->nullable();
            $table->string('phone');
            $table->decimal('amount', 10, 2);
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade');
            $table->enum('status',['pending','success','failed'])->default('pending'); // success, failed, pending
            $table->string('response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
