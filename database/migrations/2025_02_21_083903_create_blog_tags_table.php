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
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('tag_id');

            $table->unique(['blog_id', 'tag_id']);

            $table->index('blog_id', 'blog_tag_blog_idx');
            $table->index('tag_id', 'tag_blog_tag_idx');

            $table->foreign('blog_id', 'blog_tag_blog_fk')->on('blogs')->references('id');
            $table->foreign('tag_id', 'tag_blog_tag_fk')->on('tags')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_tags');
    }
};
