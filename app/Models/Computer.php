<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spec;

class Computer extends Model
{ 
    use HasFactory;
    // protected $fillable = ['status','room','pc_no']; 
    protected $guarded = [];

    public function spec(){
    	return $this->hasOne(Spec::class);
    }

    
}
