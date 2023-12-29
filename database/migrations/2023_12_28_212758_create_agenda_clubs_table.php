<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendaClubs', function (Blueprint $table) {
        $table->id('AgendaClubID');
        $table->unsignedBigInteger('ClubID');
        $table->unsignedBigInteger('ScheduleID');
        $table->unsignedBigInteger('DayID');
        $table->timestamps();

        $table->foreign('ClubID')->references('ClubID')->on('clubs');
        $table->foreign('ScheduleID')->references('ScheduleID')->on('schedules');
        $table->foreign('DayID')->references('DayID')->on('club_days');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_clubs');
    }
};
