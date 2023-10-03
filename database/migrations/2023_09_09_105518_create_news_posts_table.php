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
            $table->bigInteger('news_type')->nullable();
            $table->bigInteger('category_id')->comment('Menu');
            $table->bigInteger('subcategory_id')->comment('submenu')->nullable();
            $table->bigInteger('user_id')->comment('admin,reporter')->nullable();
            $table->bigInteger('role_id')->comment('reporter = 2')->nullable();
            $table->bigInteger('reporter_id')->comment('user id')->nullable();
            $table->string('old_parm')->comment('Old parameter')->nullable();
            $table->text('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('heading')->nullable();
            $table->longText('heading2')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('caption')->nullable();
            $table->string('pdf_file')->nullable();
            $table->longText('news_description')->nullable();
            $table->bigInteger('sort_id')->nullable(); 

            // checkbox
            $table->string('slider', 255)->comment('Slider path')->nullable();
            $table->string('breaking_top', 255)->comment('Breaking news top')->nullable();
            $table->string('breaking_side', 255)->comment('Breaking news side')->nullable();
            $table->string('top_stories', 200)->comment('Top stories')->nullable();
            $table->string('gallery', 200)->comment('Gallery')->nullable();
            $table->string('more', 200)->comment('More info')->nullable();
            $table->string('send_noti', 255)->comment('Send notification')->nullable();
            $table->text('metatags')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->enum('status', ['Approved','Rejected','Pending'])->default('Approved');
            $table->longText('reject_reason')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->bigInteger('login')->nullable();
            $table->string('post_date')->comment('post_date')->nullable();
            $table->string('post_month')->comment('post_date')->nullable();
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
