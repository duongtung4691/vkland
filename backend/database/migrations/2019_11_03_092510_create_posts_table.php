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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('share_url')->nullable();
            $table->string('slug');
            $table->string('excerpt');
            $table->text('plain_text');
            $table->text('content');
            $table->string('author_name', 50);
            $table->integer('user_id');
            $table->string('status', 20);
            $table->string('published_at', 15)->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('top_background_url')->nullable();
            $table->tinyInteger('is_comment')->nullable()->default(1);
            $table->smallInteger('comment_count')->nullable()->default(0);
            $table->string('post_type', 10);
            $table->string('category_type', 20)->nullable();
            $table->string('price', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('subdistrict', 50)->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_url')->nullable();
            $table->text('banner_template')->nullable();
            $table->integer('category_id')->nullable()->default(0);
            $table->integer('disease_id')->nullable()->default(0);
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->string('deleted_at', 15)->nullable();
            $table->tinyInteger('is_highlight')->nullable()->default(0);
            $table->tinyInteger('showon_homepage')->nullable()->default(0);
			$table->string('time_expired_deal', 15)->nullable();
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
