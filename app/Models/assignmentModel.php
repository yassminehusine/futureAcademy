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
        'file_path',
        'img_path',
        'user_id',
        'status',
        'user_course_id',
        'due_date',
       
    ];

    public function Course(){
        return $this->belongsTo(coursesModel::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
  
}
