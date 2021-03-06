<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesIdColumnSubcategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign(['categories_id']);
        });
        }

}
