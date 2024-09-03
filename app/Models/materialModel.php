<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialModel extends Model
{
    use HasFactory;

    protected $table = 'material';

    protected $fillable = [
    'title',
    'description',
    'material_type',
    'file_path',
    'video_duration',
    'file_size',
    'user_id',
    'file_format',
    'course_id',];
}
