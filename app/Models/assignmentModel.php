<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignmentModel extends Model
{
    use HasFactory;
    protected $table = 'assignments';
    protected $fillable = [
        'title',
        'content',
        'image',
        'file_path',
        'user_id',
        'status',
        'course_id',
        'video_url',
        'year',
        'due_date',
       
    ];
}
