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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('unique_identifier', 50)->unique();
            $table->string('blog_title');
            $table->string('blog_img');
            $table->date('blog_post_date');
            $table->text('blog_body');
            $table->integer('created_by'); // ID of the user who created the blog post
            $table->timestamps(); // created_at and updated_at
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
