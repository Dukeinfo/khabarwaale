<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_polls', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();
            $table->string('slug')->nullable();
            $table->text('options')->nullable();
            
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('sort_id')->nullable(); 
            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->string('login')->nullable();
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
        Schema::dropIfExists('add_polls');
    }
}
