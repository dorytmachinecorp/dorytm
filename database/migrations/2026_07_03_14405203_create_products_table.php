<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();

            // JSON fields for flexible data
            $table->json('applications')->nullable();
            $table->json('features')->nullable();
            $table->json('technical_specifications')->nullable();

            // Specific technical fields based on spec
            $table->string('capacity')->nullable();
            $table->string('power')->nullable();
            $table->string('voltage')->nullable();
            $table->string('material')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['category_id', 'status', 'is_featured', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
