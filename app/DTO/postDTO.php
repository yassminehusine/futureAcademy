<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use  App\Http\Requests\postRequest;
class postDTO extends Data{
   public function __construct( 
        public string $post_name,
        public string  $image,
        public string  $description,
        public string $post_number,
   ){}
   public static function handleInputs(postRequest $postRequest){
      $data =  [
         'post_name' => $postRequest->post_name,
         'image' => $postRequest->image,
         'description' => $postRequest->description,
         'post_number' => $postRequest->post_number,
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