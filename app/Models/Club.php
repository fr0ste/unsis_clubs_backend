<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';
    protected $primaryKey = 'ClubID';
    public $timestamps = true;
    protected $fillable = ['ClubName', 'Description'];

    public function agendaClubs()
    {
        return $this->hasMany(AgendaClub::class, 'ClubID');
    }
}
