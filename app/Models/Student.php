<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student_time;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // public function time(){
    // 	return $this->hasOne(student_time::class, 'student_id', 'student_id');
    // }

    public function time()
    {
        return $this->hasOne(student_time::class);
    }

    
}
