<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        'name',
        'address',
        'mobile_no',
        'course_id',
        'user_id'
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }
}