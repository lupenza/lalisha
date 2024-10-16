<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageUs extends Model
{
    use HasFactory, SoftDeletes;

    public $table ='message_us';

    protected $fillable =['name','phone_number','email','subject','message'];
}
