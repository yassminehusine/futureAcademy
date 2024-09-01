<?php
namespace App\Repository\interface;
use App\Enums\Rolse;
use App\Http\Requests\UserRequest;

interface IUserRepository {
    public function getAllUsers();
    public function getUserById($id);
    public function create( $request);
    public function update($request, $id);
    public function delete($id);
    public function getUsersByRole(Rolse  $role);
    public function getCount(Rolse  $role);
}
?>