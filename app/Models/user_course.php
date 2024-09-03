<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_course extends Model
{
    use HasFactory;
    protected  $table  = 'user_courses';
    protected $fillable = [
        'user_id',
        'course_id',
        'pract_mark',
        'total_mark',
        'test_mark',
        'grade',
        'group_number',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(coursesModel::class);
    }
  
}
