<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'question_title',
        'question_desc',
        'question_cat_id',
        'question_email'
    ];
}