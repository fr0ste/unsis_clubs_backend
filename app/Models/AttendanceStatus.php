<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStatus extends Model
{
    protected $table = 'attendance_status';
    protected $primaryKey = 'AttendanceStatusID';
    public $timestamps = true;
    protected $fillable = ['AttendanceStatus'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'AttendanceStatus');
    }
}
