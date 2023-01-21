<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'ans',
        'ans_que_id',
        'ans_email',
    ];
}