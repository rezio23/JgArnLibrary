<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id('BorrowingID');
            $table->foreignId('UserID')->constrained('users', 'id')->onDelete('cascade');
            $table->unsignedBigInteger('BookID');
            $table->foreign('BookID')->references('BookID')->on('books')->onDelete('cascade');
            $table->dateTime('BorrowedDate');
            $table->dateTime('ReturnedDate')->nullable();
            $table->string('Status')->default('borrowed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
