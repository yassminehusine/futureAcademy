<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use  App\Http\Requests\postRequest;
class postDTO extends Data{
   public function __construct( 
        public string $title,
        public string  $image,
        public string  $description,
   ){}
   public static function handleInputs(postRequest $postRequest){
      $data =  [
         'title' => $postRequest->post_name,
         'description' => $postRequest->description,
      ];
      if ($postRequest->image) {
          $image = $postRequest->image;
          $newImageName = time() . $image->getClientOriginalName();
          $image->move('image/postImages/', $newImageName);
          $data['image'] = 'image/postImages/' . $newImageName;
      }
      return $data;
  } 
}
?>