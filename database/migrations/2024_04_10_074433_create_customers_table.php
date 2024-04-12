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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');   //customer_id
            $table->string('name', 60)->nullable();  //name
            $table->string('email',100)->nullable();
            $table->enum('gender', ["M", "F", "O"]);  //It will allow ony m,f,o
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('password')->nullable();
            $table->string('status', 10)->default('Active');
            $table->integer('points')->default(0);
            $table->timestamps();   //created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
