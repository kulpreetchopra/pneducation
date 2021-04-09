<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_order_products', function (Blueprint $table) {
            $table->id();
            $table->string('course_order_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_price')->nullable();
            $table->string('course_quantity')->nullable();
            $table->string('course_image')->nullable();
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
        Schema::dropIfExists('course_order_products');
    }
}
