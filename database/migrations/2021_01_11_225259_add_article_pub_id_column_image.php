<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticlePubIdColumnImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images',
            function (Blueprint $table) {
                $table->unsignedBigInteger('article_pub_id');
                $table->foreign('article_pub_id')->references('id')->on('articles')->onDelete('restrict');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images',
            function (Blueprint $table) {
                $table->dropForeign(['article_pub_id']);
            });
    }
}
