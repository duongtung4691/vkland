<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('excerpt')->nullable();
            $table->longText('plain_text');
            $table->longText('content');
            $table->string('author_name', 50)->nullable();
            $table->integer('user_id');
            $table->string('slug');
            $table->string('status', 15);
            $table->integer('category_id');
            $table->string('thumbnail_url');
            $table->bigInteger('display_order')->nullable();
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->string('page_type', 15);
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
        Schema::dropIfExists('pages');
    }
}
