<?php
namespace App\Repository\interface;
use App\Enums\departmentRolse;
use App\Enums\Rolse;
interface IfrontRepository
{
    public function getNav();
    public function getNavById($id);
    public function createNav($request); 
    public function updateNav( $request, $id); // Updated to match interface
    public function deleteNav( $id);

    public function getSlider();
    public function getSliderById($id);
    public function createSlider($request); 
    public function updateSlider( $request, $id); // Updated to match interface
    public function deleteSlider( $id);

    public function getHeader();
    public function getHeaderById($id);
    public function createHeader($request); 
    public function updateHeader( $request, $id); // Updated to match interface
    public function deleteHeader( $id);

    public function getFooter();
    public function getFooterById($id);
    public function createFooter($request); 
    public function updateFooter( $request, $id); // Updated to match interface
    public function deleteFooter( $id);
}


