<?php
namespace App\Repository;
use App\Enums\departmentRolse;
use App\Models\coursesModel;
use App\Repository\interface\IcoursesRepository;
use App\Enums\Rolse;
class coursesRepository implements IcoursesRepository
{
    public function getAll()
    {
       return coursesModel::with('department')->get();
    }

    public function getById($id)
    {
        return coursesModel::findOrFail($id);
    }

    public function create($request)
    {
        return coursesModel::create($request);
    } 

    public function update($request, $id)
    {
        return coursesModel::findOrFail($id)->update($request);
    } 

    public function delete($id)
    {
        return coursesModel::findOrFail($id)->delete();
    }

    public function getByRole(departmentRolse $role)
    {
        return coursesModel::where('department_name', $role->value)->get();
    }

    public function getUsersByRole(Rolse $role)
    {
        return coursesModel::where('course_name', $role->value)->get();
    }
}
?>















<!-- <?php
// namespace App\Repository\interface;
// use App\Enums\departmentRolse;
// use App\Models\coursesModel;
// use App\Repository\interface\IcoursesRepository;
// use App\Enums\Rolse;
// class coursesRepository  implements  IcoursesRepository{
//     public function getAll(){
//         return coursesModel::all();
//     }
//     public function getById($id){
//         return coursesModel::findOrFail($id);
//     }
//     public function create($request){
//         return coursesModel::create($request);
//     } 
//     public function update($request,$id){
//         return coursesModel::findOrFail($id)->update($request); 
//     } 
//     public function delete( $id){
//         return coursesModel::findOrFail($id)->delete();
//     }
//     public function getByRole(departmentRolse $role){
//         return coursesModel::where('department_name', $role->value)->get();
//     }
//     public function getUsersByRole(Rolse $role){
//         return coursesModel::where('course_name', $role->value)->get();
//     }
// }
?> -->