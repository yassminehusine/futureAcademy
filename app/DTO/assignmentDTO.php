<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use App\Http\Requests\assignmentRequest;
class assignmentDTO extends Data{
    public function __construct(
    public string   $title,
    public string  $content,
    //public string  $image,
    public string  $video_url,
    // public string $audio_url,
    public string   $status,
    public string  $user_id,
    public string  $course_id,
    public string  $year,
    public string $due_date,
    public string $file_path,

    ){}
    public static function handleInputs(assignmentRequest $assignmentRequest){
        $data = [
            'title' => $assignmentRequest->title,
            'content' => $assignmentRequest->content,
            //'image' => $assignmentRequest->image,
            //'file_path' => $assignmentRequest->file_path,
            'user_id' => $assignmentRequest->user_id,
            'course_id' => $assignmentRequest->course_id,
            'year' => $assignmentRequest->year,
            'video_url' => $assignmentRequest->video_url,
            // 'audio_url' => $assignmentRequest->audio_url,
            'due_date' => $assignmentRequest->due_date,
            'status' => $assignmentRequest->status,


           ];
        if ($assignmentRequest->file_path) {
            $file = $assignmentRequest->file_path;
            $newfileName = time(). $file->getClientOriginalName();
            $file->move('image/assignmentImages/', $newfileName);
            $data['file_path'] = 'image/assignmentImages/'. $newfileName;
        }
         return $data;
    }
}
