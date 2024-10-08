<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use App\Http\Requests\CourseRequest;
class coursesDTO extends Data{
    public function __construct(
    public string   $course_name,
    public string  $description,
    public string  $image,
    public string  $credit_hours,
    public string $department_id,
    public string $course_code,
    ){}
    public static function handleInputs(CourseRequest $courseRequest){
        $data = [
            'course_name' => $courseRequest->course_name,
            'course_code' => $courseRequest->course_code,
            'description' => $courseRequest->description,
            'credit_hours' => $courseRequest->credit_hours,
            'department_id' => $courseRequest->department_id,
        ];
        if ($courseRequest->image) {
            $image = $courseRequest->image;
            $newImageName = time(). $image->getClientOriginalName();
            $image->move('image/courseImages/', $newImageName);
            $data['image'] = 'image/courseImages/'. $newImageName;
        }
         return $data;
    }
}
