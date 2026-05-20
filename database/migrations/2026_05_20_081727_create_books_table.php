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
        Schema::create('books', function (Blueprint $table) {
            $table->id('BookID');
            $table->string('BookName', 255);
            $table->unsignedBigInteger('CategoryID');
            $table->foreign('CategoryID')->references('CategoryID')->on('categories')->onDelete('cascade');
            $table->integer('Qty')->default(0);
            $table->text('Description')->nullable();
            $table->timestamp('CreatedDate')->useCurrent();
            $table->timestamp('UpdatedDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
