<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('slug')->unique();
            $table->string('summary', 500);
            $table->string('category', 100);
            $table->string('status', 20)->default('draft')->index();
            $table->string('author_name', 150);
            $table->json('tags')->nullable();
            $table->string('caption')->nullable();
            $table->string('photo_credit')->nullable();
            $table->longText('content')->nullable();
            $table->string('document_path')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->text('review_note')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
