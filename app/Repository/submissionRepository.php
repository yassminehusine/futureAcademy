<?php
namespace App\Repository;
use App\Enums\departmentRolse;
use App\Models\submissionModel;
use App\Repository\interface\IsubmissionRepository;
use App\Enums\Rolse;
class submissionRepository implements IsubmissionRepository
{
    public function getAll()
    {
       return submissionModel::with('course')->get();
    }

    public function getById($id)
    {
        return submissionModel::findOrFail($id);
    }

    public function create($request)
    {
        return submissionModel::create($request);
    } 

    public function update($request, $id)
    {
        return submissionModel::findOrFail($id)->update($request);
    } 

    public function delete($id)
    {
        return submissionModel::findOrFail($id)->delete();
    }

    public function getByRole(departmentRolse $role)
    {
        return submissionModel::where('department_name', $role->value)->get();
    }

    public function getUsersByRole(Rolse $role)
    {
        return submissionModel::where('course_name', $role->value)->get();
    }
}

