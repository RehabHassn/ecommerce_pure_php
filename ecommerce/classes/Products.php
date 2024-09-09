<?php
require_once 'Shipment.php';
// require_once 'Discount.php';

class Products extends Shipment
{
    // private $name;
    // private $price;
    public $discount;

    public function __construct() //$name, $price
    {
    //     $this -> name =$name;
    //     $this -> price = $price;
        // $this-> discount = new Discount();

    }

    // public function get_name()
    // {
    //     return $this -> name;
    // }

    // public function get_price()
    // {
    //     return $this -> price;
    // }
    /////////////////////////////////////////////////////////////////////////////////////
        public static $name;

    public static function get_info($price) // static i can use the function without creating object (helper functions)
    {
        echo 'product name ==> '.self::$name.' and price ==> '.$price;  // this -> object of the class --- self -> class its self
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // composition

    // public $discount;

    // public function disc()
    // {
    //     $this-> discount = new Discount(); // create object here or in the constructor 
    // }

                

}