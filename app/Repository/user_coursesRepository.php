<?php
namespace App\Repository;
use App\Repository\interface\Iuser_coursesRepository;
use App\Models\user_course;
class user_coursesRepository implements Iuser_coursesRepository{
    public function getAll(){
        return user_course::all();
    }
    public function getById($id){
        return user_course::findOrFail($id);
    }
    public function create($request){
        return user_course::create($request);
    } 
    public function update( $request, $id){
        return user_course::findOrFail($id)->update($request);
    } 
    public function delete( $id){
        return user_course::findOrFail($id)->delete();
    }

}






?>