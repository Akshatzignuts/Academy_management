<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_name',
        'address',
        'mobile_no',
        'user_id'
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}