<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubDay extends Model
{
    protected $table = 'club_days';
    protected $primaryKey = 'DayID';
    public $timestamps = true;
    protected $fillable = ['DayName'];

    public function agendaClubs()
    {
        return $this->hasMany(AgendaClub::class, 'DayID');
    }
}
