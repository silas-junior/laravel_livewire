<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{

    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                ->nullable()
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->foreignId('student_id')
                ->nullable()
                ->constrained('students')
                ->cascadeOnDelete();
            $table->dateTime('enrollment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::dropIfExists('enrollments');
    }
}
