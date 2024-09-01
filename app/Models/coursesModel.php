<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursesModel extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'course_name',
        'description',
        'image',
        'credit_hours',
        'user_id',
        'department_id'
    ];
    public function department(){
        return $this->belongsTo(departmentModel::class);
    }
}
