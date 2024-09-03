<?php
namespace App\DTO;
use App\Http\Requests\materialRequest;
use Spatie\LaravelData\Data;
class materialDTO extends Data{
    public function __construct(
        public string $title,
        public string $description,
        public string  $file_path,
        public string  $thumbnail_path,
        public string  $user_id,
        public string  $courses_id,

    ){}
    public static function handleInputs(materialRequest $materialRequest){
        $data=[
              'title' =>$materialRequest->title,
              'description' => $materialRequest->description,
              'file_path' => $materialRequest->file_path,
              'thumbnail_path' => $materialRequest->thumbnail_path,
              'user_id' => $materialRequest->user_id,
              'courses_id' => $materialRequest->courses_id,
        ];
        if($materialRequest->thumbnail_path){
            $image = $materialRequest->thumbnail_path;
            $newImageName = time().$image->getClientOriginalName();
            $image->move('image/materialImages/', $newImageName);
            $data['thumbnail_path'] = 'image/materialImages/'.$newImageName;
        }
        if ($materialRequest->file_path) {
            $file = $materialRequest->file_path;
            $newFileName = time().$file->getClientOriginalName();
            $filePath = $file->storeAs('public/materials', $newFileName);
            $data['file_path'] = $filePath; 
        }
        return  $data;
    }
}