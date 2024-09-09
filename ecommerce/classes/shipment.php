<?php
class Shipment
{
    private $del_price;
    public function delivery($item)
    {
        echo $item.' will be delivered soon';
    }

    protected function calc_tax($price){
        echo 'tax===>'.$price/10;
    }
}