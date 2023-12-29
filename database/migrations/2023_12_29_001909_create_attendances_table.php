<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->unsignedBigInteger('ClubID');
            //$table->string('StudentID', 10);
            $table->date('AttendanceDate');
            $table->unsignedBigInteger('AttendanceStatus');
            $table->timestamps();

            $table->foreign('ClubID')->references('ClubID')->on('clubs');
            //$table->foreign('StudentID')->references('StudentID')->on('students');
            $table->foreign('AttendanceStatus')->references('AttendanceStatusID')->on('attendance_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
