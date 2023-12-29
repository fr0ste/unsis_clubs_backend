<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaClub extends Model
{
    protected $table = 'agendaClubs';
    protected $primaryKey = 'AgendaClubID';
    public $timestamps = true;
    protected $fillable = ['ClubID', 'ScheduleID', 'DayID'];

    public function club()
    {
        return $this->belongsTo(Club::class, 'ClubID');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'ScheduleID');
    }

    public function clubDay()
    {
        return $this->belongsTo(ClubDay::class, 'DayID');
    }
}