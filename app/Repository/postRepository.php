<?php
namespace App\Repository;
use App\Models\postModel;
use App\Repository\interface\IpostRepository;
use RealRashid\SweetAlert\Facades\Alert;

class postRepository implements IpostRepository
{
    public function getAll()
    {
        return postModel::all();
    }

    public function getById($id)
    {
        return postModel::findOrFail($id);
    }

    public function create( $request)
    {
        return postModel::create($request);
    }

    public function update($request, $id)
    {
        return postModel::findOrFail($id)->update($request);
    }

    public function delete($id)
    {
        return postModel::findOrFail($id)->delete();
    }

}


