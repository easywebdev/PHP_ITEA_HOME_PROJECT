<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_lessons', function (Blueprint $table) {
            $table->integer('days_id');
            $table->integer('lessons_id');
            $table->foreign('days_id')->references('id')->on('days')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lessons_id')->references('id')->on('lessons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days_lessons');
    }
}
