<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pre_registers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('national_id')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->date('expected_date');
            $table->time('expected_time');
            $table->text('comment')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_registers');
    }
};
