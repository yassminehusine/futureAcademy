<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postModel extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'post_name',
        'image',
        'description',
        'post_number',
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
