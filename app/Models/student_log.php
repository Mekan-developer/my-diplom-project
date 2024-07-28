<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;
use App\Models\Computer;

class student_log extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function student(){
    	return $this->belongsTo(Student::class, 'student_id', 'barcode');
    }
    public function staff(){
    	return $this->belongsTo(User::class, 'staff_id', 'id');
    }
    public function computer(){
    	return $this->belongsTo(Computer::class);
    }
    
}
