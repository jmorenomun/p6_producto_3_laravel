<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleToCourseOfferings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_offerings', function (Blueprint $table) {
            $table->bigInteger('schedule_id')->unsigned()->index()->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_offerings', function (Blueprint $table) {
            $table->dropForeign('lists_schedule_id_foreign');
            $table->dropIndex('lists_schedule_id_index');
            $table->dropColumn('schedule_id');
        });
    }
}
