<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // We need to set up the columns first before adding foreign key
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->bigIncrements('post_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('comments', function($table){
            //Setup post_id as foregin key
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            //cascade means when someone deletes the post it will delete the reference
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Kill the foreign key constraint
        Schema::dropForeign(['post_id']);
        Schema::dropIfExists('comments');
    }
}
