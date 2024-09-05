<?php
namespace App\DTO;
use App\Models\assignmentModel;
use App\Models\submissionModel;
use App\Models\user_course;
use Carbon\Carbon;

use Auth;
use Carbon\Traits\Timestamp;
use Spatie\LaravelData\Data;
use App\Http\Requests\submissionRequest;
class submissionDTO extends Data
{
    public function __construct(
        public string $submission_date,
        public string $submission_file,
        public string $status,
        public string $comment,
        public string $grade,
        public string $assignment_id,
        public string $user_id,
        public string $submission_text,
        public string $resubmitted,
        public string $is_late,

    ) {
    }
    public static function handleInputs(submissionRequest $submissionRequest ,$id)
    {
        $assignment = assignmentModel::where('id',$id)->first();
        $submissions = submissionModel::where('user_id', Auth::id())->with(['assignment','course'])->get();
        $due_date = Carbon::parse($assignment->due_date);
        $submission_date = Carbon::parse(now());


        $data = [
            'submission_date' => $submission_date,
            'submission_text' => $submissionRequest->submission_text,
            'user_id' => Auth::user()->id,
            'grade' => $submissionRequest->grade ?? "",
            'status' => $submissionRequest->status ?? "pending",
            'comment' => $submissionRequest->comment ?? "",
            'assignment_id'=> $id

        ];

        if (count($submissions) > 1) {
            $data['resubmitted'] = true;
        } else {
            $data['resubmitted'] = false;
        }
        if ($submission_date->greaterThan($due_date)) {
            $data['is_late'] = true;


        } else {
            $data['is_late'] = false;
        }
        if ($submissionRequest->submission_file) {
            $file = $submissionRequest->file_path;
            $newfileName = time() . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/materials', $newfileName);
            $data['submission_file'] = $filePath;
        }
        return $data;
    }
}
?>