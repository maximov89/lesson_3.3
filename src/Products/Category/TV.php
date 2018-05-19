<?php
namespace Products\Category;

use Products\Product;

class TV extends Product
{
    private $size = 'не указана';
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function printDescription()
    {
        echo ', <b>диагональ:</b> '.$this->size.' дюймов';
    }
}
