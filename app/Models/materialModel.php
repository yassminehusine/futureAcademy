<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class materialModel extends Model{
    use HasFactory;
    protected $table = 'material';
    protected $fillable = [
    'title',
    'description',
    'file_path',
    'thumbnail_path',
    'user_id',
    'courses_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function course(){
        return $this->belongsTo(coursesModel::class);
    }
}
