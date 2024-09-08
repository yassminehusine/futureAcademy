<?php
namespace App\DTO;

use App\Http\Requests\ChangePasswordRequest;
use Auth;
use Spatie\LaravelData\Data;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserDTO extends Data
{
    public function __construct(
        public string $name,
        public string $image,
        public string $role,
        public string $academic_level,
        public float $GPA,
        public string $phone,
        public string $address,
        public string $email,
        public string $department_id,
        public string $password,
        public string $current,
        public string $newpassword,
    ) {
        // إزالة التشفير من هنا
    }

    public static function handleInputs(UserRequest $userRequest)
    {
                $user = User::where('id', Auth::id());

        $data = [
            'name' => $userRequest->name,
            'role' => $userRequest->role,
            'academic_level' => $userRequest->academic_level ?? "None",
            'GPA' => $userRequest->GPA,
            'phone' => $userRequest->phone,
            'address' => $userRequest->address,
            'email' => $userRequest->email,
            'department_id' => $userRequest->department_id,
        ];

        if ($userRequest->image) {
            $image = $userRequest->image;
            $newImageName = time() . $image->getClientOriginalName();
            $image->move('image/userImage/', $newImageName);
            $data['image'] = 'image/userImage/' . $newImageName;
        }
        if ($userRequest->password) {
            $data['password'] = bcrypt($userRequest->password);
        }

        if($userRequest->academic_level){
            $data['academic_level'] = $userRequest->academic_level ;

        }
        // if ($userRequest->newpassword && $userRequest->current == decrypt($user->password)) {


        //     $data['password'] = bcrypt($userRequest->newpassword);
        // }
        return $data;
    }


    // public static function changepass(ChangePasswordRequest $request, $current)
    // {

    //     $user = User::where('id', Auth::id());

    //     if ($request->current == $user->password) {
    //         $data = ['password' => $request->newpassword];

    //         return $data;
    //     }

    // }
}
























// public function __construct(
//     public string $name,
//     public string $image,
//     public string $role,
//     public string $academic_years,
//     public float $GPA,
//     public string $phone,
//     public string $address,
//     public string $email,
//     public string $department_id,
//     public string $password,

// ) {}
// public static function handleInputs(UserRequest $userRequest)
// {
//     $data = [
//         'name' => $userRequest->name,
//         'role' => $userRequest->role,
//         'academic_years' => $userRequest->academic_years,
//         'GPA' => $userRequest->GPA,
//         'phone' => $userRequest->phone,
//         'address' => $userRequest->address,
//         'email' => $userRequest->email,
//         'department_id' => $userRequest->department_id,
//         'password' => $userRequest->password,
//     ];
//     if ($userRequest->image) {
//         $image = $userRequest->image;
//         $newImageName = time() . $image->getClientOriginalName();
//         $image->move('image/userImage/', $newImageName);
//         $data['image'] = 'image/userImage/' . $newImageName;
//     }
//     if($userRequest->password){
//         $data['password'] = $userRequest->password;
//     }
//     return $data;
// }