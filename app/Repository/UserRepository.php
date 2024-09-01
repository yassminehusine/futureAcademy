<?php
namespace App\Repository;
use App\Enums\Rolse;
use App\Models\User;
use App\Repository\Interface\IUserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class UserRepository implements IUserRepository
{
    public function getAllUsers()
    {
        return  User::with('department')->get();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function create($request)
    {
        return User::create($request); 
    }

    public function update($request, $id){
        $user = User::findOrFail($id)->update($request);

    }
    public function delete($id){
        return User::findOrFail($id)->delete(); 
    }
    public function getUsersByRole(Rolse $role)
    {
        return User::where('role', $role->value)->get();
    }

    public function getCount(Rolse  $role)
    {
        return User::where('role', $role->value)->count(); // Count users by role
    }

    // public function getWithLimitAndRole(Role $role, int $limit)
    // {
    //     return User::where('role', $role->value)->limit($limit)->get(); // Get users by role with limit
    // }
}


?> 




