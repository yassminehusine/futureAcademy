<?php
namespace App\Repository\interface;

interface Iuser_coursesRepository
{
    public function getAll();
    public function getById($id);
    public function create($request); 
    public function update( $request, $id); // Updated to match interface
    public function delete( $id);
}


?>