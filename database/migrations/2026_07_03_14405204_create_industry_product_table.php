<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industry_product', function (Blueprint $table) {
            $table->foreignId('industry_id')->constrained('industries')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->primary(['industry_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_product');
    }
};
