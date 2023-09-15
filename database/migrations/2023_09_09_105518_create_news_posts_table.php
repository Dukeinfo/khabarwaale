<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('reporter_id')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->enum('news_type' , ['English','Punjabi','Hindi','Urdu'])->nullable();
            $table->text('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('heading')->nullable();
            $table->text('heading2')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('caption')->nullable();
            $table->string('pdf_file')->nullable();
       
            $table->longText('news_description')->nullable();
            $table->text('tags')->nullable()->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->string('breaking_news')->nullable();
            $table->string('slider_news')->nullable();
            $table->string('flash_news')->nullable();
            $table->string('trending_news')->nullable();
            $table->string('top_story')->nullable();
            $table->integer('latest_news')->nullable();
            $table->string('gallery')->nullable();
            $table->string('more_news')->nullable();
            $table->string('send_notification')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
      // Open Graph Fields
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->bigInteger('login')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('news_posts');
    }
}
