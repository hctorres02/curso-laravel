<?php

use App\Enums\CommentStatus;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'author_id')->constrained();
            $table->foreignIdFor(Post::class, 'post_id')->constrained();
            $table->string('body');
            $table->enum('status', CommentStatus::cases())->default(CommentStatus::Pending);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
