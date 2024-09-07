<?php
namespace App\Repository;
use App\Enums\departmentRolse;
use App\Models\coursesModel;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Navbar;
use App\Models\Slider;
use App\Repository\interface\IfrontRepository;
use App\Enums\Rolse;
class frontRepository implements IfrontRepository
{
    public function getNav()
    {
       return Navbar::all();
    }
    public function getSlider()
    {
       return Slider::all();
    }
    public function getHeader()
    {
       return Header::all();
    }
    public function getFooter()
    {
       return Footer::all();
    }

    public function getNavById($id)
    {
        return Navbar::findOrFail($id);
    }

    public function getSliderById($id)
    {
        return Slider::findOrFail($id);
    } 
    
    public function getHeaderById($id)
    {
        return Header::findOrFail($id);
    } 
    
    public function getFooterById($id)
    {
        return Footer::findOrFail($id);
    }

    public function createNav($request)
    {
        return Navbar::create($request);
    } 

    public function createSlider($request)
    {
        return Slider::create($request);
    } 

    public function createHeader($request)
    {
        return Header::create($request);
    } 

    public function createFooter($request)
    {
        return Footer::create($request);
    } 

    public function updateNav($request, $id)
    {
        return Navbar::findOrFail($id)->update($request);
    } 

    public function updateSlider($request, $id)
    {
        return Slider::findOrFail($id)->update($request);
    } 

    public function updateHeader($request, $id)
    {
        return Header::findOrFail($id)->update($request);
    } 


    public function updateFooter($request, $id)
    {
        return Footer::findOrFail($id)->update($request);
    } 


    

    public function deleteNav($id)
    {
        return Navbar::findOrFail($id)->delete();
    }

    
    public function deleteSlider($id)
    {
        return Slider::findOrFail($id)->delete();
    }

    
    public function deleteHeader($id)
    {
        return Header::findOrFail($id)->delete();
    }

    
    public function deleteFooter($id)
    {
        return Footer::findOrFail($id)->delete();
    }
}
?>















<!-- <?php
// namespace App\Repository\interface;
// use App\Enums\departmentRolse;
// use App\Models\coursesModel;
// use App\Repository\interface\IfrontRepository;
// use App\Enums\Rolse;
// class frontRepository  implements  IfrontRepository{
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