<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submissionModel extends Model
{
    use HasFactory;

    protected $table = "submissions";

    protected $fillable = [
        'submission_date',
        'submission_file',
        'status',
        'comment',
        'grade',
        'assignment_id',
        'user_id',
        'submission_text',
        'resubmitted',
        'is_late',

    ];

    public function assignment(){
        return $this->belongsTo(assignmentModel::class);
    }

    public function course(){
        return $this->belongsTo(coursesModel::class);
    }
}
