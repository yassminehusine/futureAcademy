<?php
namespace App\Repository\interface;
use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Enums\Role;
interface IUserRepository {
    public function getAllUsers();
    public function getUserById($id);
    public function create( $request);
    public function update($request, $id);
    public function delete($id);
    public function getUsersByRole(Role $role);
    public function getCount(Role $role);
}
?>