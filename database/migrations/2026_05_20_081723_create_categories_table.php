<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('CategoryID');
            $table->string('CategoryName', 255);
            $table->text('Description')->nullable();
            $table->timestamp('CreatedDate')->useCurrent();
            $table->timestamp('UpdatedDate')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
