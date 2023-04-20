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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('price');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_lubed')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->enum('type_of_switch',['clacky', 'thocky'])->default('clacky');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
