<?php

namespace App\Models;

use App\Enums\Year;
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
        // 'department_number',
    ];

    protected $casts = [
        'academic_level' => Year::class,
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
