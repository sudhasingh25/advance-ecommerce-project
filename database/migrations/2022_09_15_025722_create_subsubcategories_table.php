<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->id();
            
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('sub_subcategory_name_en');
            $table->string('sub_subcategory_name_hi');
            $table->string('sub_subcategory_slug_en');
            $table->string('sub_subcategory_slug_hi');
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
        Schema::dropIfExists('subsubcategories');
    }
}
