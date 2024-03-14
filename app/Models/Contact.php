<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";

    protected $fillable = [
        'name',
        'address',
        'mobile_no',
        'user_id',
        'user_type',
        'teacher_assigned'
    ];
    
    //this can be used for the many to many relationship
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }   
    
}