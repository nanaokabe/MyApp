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
            $table->integer('user_id');
            $table->string('nickname');
            $table->string('frametype')->nullable();
            $table->string('colortype')->nullable();
            $table->text('body')->nullable();
            $table->string('tops')->nullable();
            $table->string('inner')->nullable();
            $table->string('bottom')->nullable();
            $table->string('shoes')->nullable();
            $table->string('image_path')->nullable();
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
