<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->date('joining_date');
        $table->enum('gender', ['Male', 'Female', 'Other']);
        $table->foreignId('department_id')->constrained()->onDelete('cascade');
        $table->foreignId('designation_id')->constrained()->onDelete('cascade');
        $table->string('password');
        $table->enum('status', ['Active', 'Inactive']);
        $table->text('about')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
