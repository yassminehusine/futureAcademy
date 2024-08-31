<?php
namespace App\Repository\interface;
use App\DTO\departmentDTO;
use App\Enums\departmentRolse;
interface IdepartmentRepository
{
    public function getAll();
    public function getById($id);
    public function create($request); 
    public function update( $request, $id); // Updated to match interface
    public function delete( $id);
    public function getByRole(departmentRolse $role);
}


?>