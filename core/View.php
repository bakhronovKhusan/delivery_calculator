<?
namespace Core;



class View
{
    public function add($fileLocation='', array $data = []){
        extract($data, EXTR_PREFIX_SAME, "wddx");
        include_once "../app/views/$fileLocation.php";
    }
}