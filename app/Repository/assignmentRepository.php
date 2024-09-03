<?php
namespace App\Repository;
use App\Enums\departmentRolse;
use App\Models\assignmentModel;
use App\Repository\interface\IassignmentRepository;
use App\Enums\Rolse;
class assignmentRepository implements IassignmentRepository
{
    public function getAll()
    {
       return assignmentModel::with('course')->get();
    }

    public function getById($id)
    {
        return assignmentModel::findOrFail($id);
    }

    public function create($request)
    {
        return assignmentModel::create($request);
    } 

    public function update($request, $id)
    {
        return assignmentModel::findOrFail($id)->update($request);
    } 

    public function delete($id)
    {
        return assignmentModel::findOrFail($id)->delete();
    }

    public function getByRole(departmentRolse $role)
    {
        return assignmentModel::where('department_name', $role->value)->get();
    }

    public function getUsersByRole(Rolse $role)
    {
        return assignmentModel::where('course_name', $role->value)->get();
    }
}
?>



