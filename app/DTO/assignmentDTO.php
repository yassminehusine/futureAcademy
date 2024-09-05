<?php
namespace App\DTO;
use App\Models\user_course;
use Auth;
use Spatie\LaravelData\Data;
use App\Http\Requests\assignmentRequest;
use Carbon\Carbon;
class assignmentDTO extends Data{
    public function __construct(
    public string   $title,
    public string  $content,
    public string   $status,
    public string  $user_id,
    public string  $course_id,
    public string $due_date,
    public string $file_path,
    public string $img_path,
    public string $assignment_points,


    ){}
    public static function handleInputs(assignmentRequest $assignmentRequest){

        $id = user_course::where('user_id', Auth::id())->where('year' , date('Y'))->first()->course_id;
        $status = "";
        $due_date = Carbon::parse($assignmentRequest->due_date);
        $today = Carbon::parse(now());

        if ($today->greaterThan($due_date)) {
            $status = "overdue";
        }else {
            $status = "ongoing";
        }
        $data = [
            'title' => $assignmentRequest->title,
            'content' => $assignmentRequest->content,
            'user_id' => Auth::user()->id,
            'due_date' => $assignmentRequest->due_date,
            'status' => $status,
            'course_id'=> $id,
            'assignment_points'=>$assignmentRequest->assignment_points,
           ];
        if ($assignmentRequest->img_path) {
            $img = $assignmentRequest->img_path;
            $newimgName = time(). $img->getClientOriginalName();
            $img->move('image/assignmentimgs/', $newimgName);
            $data['img_path'] = 'image/assignmentimgs/'. $newimgName;
        }

        if ($assignmentRequest->file_path) {
            $file = $assignmentRequest->file_path;
            $newfileName = time().$file->getClientOriginalName();
            $filePath = $file->storeAs('public/materials', $newfileName);
            $data['file_path'] = $filePath; 
        }
   
         return $data;
    }
}
?>
