<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        'payment_mode',
        'student_id',
        
    ];
    public function student()
    {
        return $this->belongsTo(Contact::class, 'student_id', 'id');
    }
}