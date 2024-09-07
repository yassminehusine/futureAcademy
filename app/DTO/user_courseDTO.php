<?php
namespace App\DTO;
use App\Models\user_course;
use Spatie\LaravelData\Data;
use App\Http\Requests\user_coursesRequest;
class user_courseDTO extends Data{
    public function __construct(
        public string $user_id,
        public string $course_id,
        public string $pract_mark,
        public string $total_mark,
        public string $test_mark,
        public string $grade,
        public string $group_number,
        public string $year,

      
    ){}
    public static function handleInputs(user_coursesRequest $user_coursesRequest){
        $course_id = $user_coursesRequest->course_id;
        $group_number = $user_coursesRequest->group_number ?? '1';
        $maxStudentsPerGroup = 10;
        $studentCountInCurrentGroup = user_course::where('course_id', $course_id)->where('group_number', $group_number)->count();
        $totalStudentCount = user_course::where('course_id', $course_id)->count();
        if ($studentCountInCurrentGroup >= $maxStudentsPerGroup && $totalStudentCount > $maxStudentsPerGroup) {
            $group_number = '2'; 
        }       
        $data = [
            'user_id' => $user_coursesRequest->user_id,
            'course_id' => $user_coursesRequest->course_id,
            'pract_mark' => $user_coursesRequest->pract_mark ?? "",
            'total_mark' => $user_coursesRequest->total_mark ?? "",
            'test_mark' => $user_coursesRequest->test_mark ?? "",
            'grade' => $user_coursesRequest->grade,
            'group_number' =>$group_number,
            'year' => date('Y'),

        ];
        return $data;
    }
}

?>