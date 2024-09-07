<?php
namespace App\DTO;
use Spatie\LaravelData\Data;
use Request;
class frontDTO extends Data{
    public function __construct(
    public string   $_name,
    public string  $description,
    public string  $image,
    public string  $credit_hours,
    public string $department_id,
    ){}
    
    public static function handleNav(Request $request){
        $data = [
            '_name' => $request->_name,
            'description' => $request->description,
            'image' => $request->image,
            'credit_hours' => $request->credit_hours,
            'department_id' => $request->department_id,
        ];
        if ($request->image) {
            $image = $request->image;
            $newImageName = time(). $image->getClientOriginalName();
            $image->move('image/Images/', $newImageName);
            $data['image'] = 'image/Images/'. $newImageName;
        }
         return $data;
    }

    public static function handleSlider(Request $request){
        $data = [
            '_name' => $request->_name,
            'description' => $request->description,
            'image' => $request->image,
            'credit_hours' => $request->credit_hours,
            'department_id' => $request->department_id,
        ];
        if ($request->image) {
            $image = $request->image;
            $newImageName = time(). $image->getClientOriginalName();
            $image->move('image/Images/', $newImageName);
            $data['image'] = 'image/Images/'. $newImageName;
        }
         return $data;
    }

    public static function handleHeader(Request $request){
        $data = [
            '_name' => $request->_name,
            'description' => $request->description,
            'image' => $request->image,
            'credit_hours' => $request->credit_hours,
            'department_id' => $request->department_id,
        ];
        if ($request->image) {
            $image = $request->image;
            $newImageName = time(). $image->getClientOriginalName();
            $image->move('image/Images/', $newImageName);
            $data['image'] = 'image/Images/'. $newImageName;
        }
         return $data;
    }


    public static function handleFooter(Request $request){
        $data = [
            '_name' => $request->_name,
            'description' => $request->description,
            'image' => $request->image,
            'credit_hours' => $request->credit_hours,
            'department_id' => $request->department_id,
        ];
        if ($request->image) {
            $image = $request->image;
            $newImageName = time(). $image->getClientOriginalName();
            $image->move('image/Images/', $newImageName);
            $data['image'] = 'image/Images/'. $newImageName;
        }
         return $data;
    }

}
