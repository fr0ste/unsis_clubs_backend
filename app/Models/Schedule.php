<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'ScheduleID';
    public $timestamps = true;
    protected $fillable = ['StartTime', 'EndTime'];

    public function agendaClubs()
    {
        return $this->hasMany(AgendaClub::class, 'ScheduleID');
    }
}