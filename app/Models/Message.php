<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table ='message';
    protected $fillable =['subjectId', 'body','fromName','fromEmail','toEmail','date','spamScore'];
    public $timestamps = false;
}
