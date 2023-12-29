<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $primaryKey = 'AttendanceID';
    public $timestamps = true;
    protected $fillable = ['ClubID', 'StudentID', 'AttendanceDate', 'AttendanceStatus'];

    public function club()
    {
        return $this->belongsTo(Club::class, 'ClubID');
    }

    /*
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }
    */

    public function attendanceStatus()
    {
        return $this->belongsTo(AttendanceStatus::class, 'AttendanceStatus');
    }
}
