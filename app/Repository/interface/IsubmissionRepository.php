<?php
namespace App\Repository\interface;
use App\Enums\departmentRolse;
use App\Enums\Rolse;
interface IsubmissionRepository
{
    public function getAll();
    public function getById($id);
    public function create($request); 
    public function update( $request, $id); // Updated to match interface
    public function delete( $id);
    public function getByRole(departmentRolse $role);
    public function getUsersByRole(Rolse $role);
}


