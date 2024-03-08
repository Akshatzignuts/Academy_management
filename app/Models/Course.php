<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";

    protected $fillable = [
        'course_name',
        'description',
        'course_time',
        'course_price',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course');
    }
    
}