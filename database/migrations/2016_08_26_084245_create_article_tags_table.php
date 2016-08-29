<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->integer('article_id')
                    ->unsigned()
                    ->index();
            $table->integer('tag_id')
                    ->unsigned()
                    ->index();
            $table->timestamps();

            /* Foreign key definitions */
            $table->foreign('article_id')
                    ->references('id')
                    ->on('articles')
                    ->onDelete('cascade');
            $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_tags');
    }
}
