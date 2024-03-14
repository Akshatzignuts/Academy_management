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

    //this can be used for the many to many relationship
    public function students()
    {
        return $this->belongsToMany(Contact::class, 'student_course');
    }
}
