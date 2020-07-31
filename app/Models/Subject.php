<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table ='subject';
    protected $fillable =['desc'];
    public $timestamps = false;
}
