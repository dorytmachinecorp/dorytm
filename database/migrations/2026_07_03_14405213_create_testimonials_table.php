<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->unsignedTinyInteger('rating')->nullable()->default(5);
            $table->text('content');
            $table->integer('sort_order')->default(0);
            $table->string('status', 20)->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
