<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    // protected $fillable = ['computer_id','processor', 'motherboard', 'ram', 'hdd','keyboard','mouse'];
    protected $guarded = [];
}
