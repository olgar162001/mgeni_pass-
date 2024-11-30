<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->unsignedBigInteger('employee_id'); // Foreign key for employee
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade'); // Reference to employees table
            $table->string('company_name')->nullable();
            $table->string('id_no');
            $table->text('purpose');
            $table->text('address')->nullable();
            $table->string('photo')->nullable(); // Photo path
            $table->string('token', 50)->unique(); // Generated once
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
