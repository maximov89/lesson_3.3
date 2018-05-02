<?php
namespace Products\Category;

use Products\Product;

class Pen extends Product
{ 
    private $ink = 'не указан';

    public function setInk($ink)
    {
        $this->ink = $ink;
    }

    public function printDescription()
    {
        echo ', <b>цвет чернил:</b> '.$this->ink;
    }
}
