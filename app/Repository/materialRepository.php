<?php
namespace App\Repository;
use App\Models\materialModel;
use App\Repository\interface\ImaterialRepository;
class materialRepository  implements ImaterialRepository 
{ 
    public function getAll(){
        return materialModel::all();
    }
    public function getById($id){
        return materialModel::findOrFail($id);
    }
    public function create($request){
        return materialModel::create($request);
    } 
    public function update( $request, $id){
        return materialModel::findOrFail($id)->update($request);
    }
    public function delete($id){
        return materialModel::findOrFail($id)->delete();
    }
}


