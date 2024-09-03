<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use App\Http\Requests\materialRequest;
class materialDTO extends Data{
    public function __construct(
     ){
      public string $title,
        public string $description,
        public string $material_type,
      public string $file_path,
        public string $video_duration,
        public string $file_size,
        public string $user_id,
     }
    public static function handleInputs(materialRequest $materialRequest){
        $data = [
            'title' => $materialRequest->title,
            'description' => $materialRequest->description,
            'material_type' => $materialRequest->material_type,
            'file_path' => $materialRequest->file_path,
            'user_id' => $materialRequest->user_id,
          'file_size' => $materialRequest->file_size,
          'video_duration' => $materialRequest->video_duration,
        ];
        
         return $data;
    }
}
?>
