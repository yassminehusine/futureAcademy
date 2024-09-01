<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departmentModel extends Model
{
    use HasFactory;
    protected $table = 'departments';

    protected $fillable = [
        'department_name',
        'image',
        'description',
        'department_number',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function courses()
    {
        return $this->hasMany(coursesModel::class);
    }

}
