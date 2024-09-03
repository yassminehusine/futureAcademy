<?php
namespace App\Repository;
use App\Enums\departmentRolse;
use App\Models\departmentModel;
use App\Repository\interface\IdepartmentRepository;
use RealRashid\SweetAlert\Facades\Alert;

class departmentRepository implements IdepartmentRepository
{
    public function getAll()
    {
        return departmentModel::all();
    }

    public function getById($id)
    {
        return departmentModel::findOrFail($id);
    }

    public function create( $request)
    {
        return departmentModel::create($request);
    }

    public function update($request, $id)
    {
        return departmentModel::findOrFail($id)->update($request);
    }

    public function delete($id)
    {
        return departmentModel::findOrFail($id)->delete();
    }

    public function getByRole(departmentRolse $role)
    {
        return departmentModel::where('department_name', $role->value)->get();
    }
    public  function getCountByRole(departmentRolse $role){
        return departmentModel::where('department_name', $role->value)->count();
    }
}


