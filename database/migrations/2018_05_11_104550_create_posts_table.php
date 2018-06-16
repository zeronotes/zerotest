<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('featured_image')->nullable();
            $table->integer('author_id');
            $table->string('post_type',10)->default('post');
            $table->integer('parent_id')->nullable();
            $table->unsignedInteger('comment_count')->default(0);
            $table->tinyInteger('template_id')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->string('status',20)->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
