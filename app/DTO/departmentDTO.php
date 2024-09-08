<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use  App\Http\Requests\departmentRequest;
class departmentDTO extends Data{
   public function __construct( 
        public string $department_name,
        public string  $image,
        public string  $description,
      //   public string $department_number,
   ){}
   public static function handleInputs(departmentRequest $departmentRequest){
      $data =  [
         'department_name' => $departmentRequest->department_name,
         'description' => $departmentRequest->description,
         // 'department_number' => $departmentRequest->department_number,
      ];
      if ($departmentRequest->image) {
          $image = $departmentRequest->image;
          $newImageName = time() . $image->getClientOriginalName();
          $image->move('image/departmentImages/', $newImageName);
          $data['image'] = 'image/departmentImages/' . $newImageName;
      }
      return $data;
  } 
}
?>