<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status', 20)->default('new'); // new, read, resolved
            $table->text('notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
        });

        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('message');
            $table->string('status', 20)->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->string('priority', 20)->default('normal'); // low, normal, high
            $table->text('notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['product_id', 'status', 'assigned_to', 'priority']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('contact_messages');
    }
};
