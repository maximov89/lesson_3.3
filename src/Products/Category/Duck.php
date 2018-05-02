<?php
namespace Products\Category;

use Products\Product;

class Duck extends Product
{ 
    public $name = 'не указано';
    public $species = 'не указана';
  
    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function printDescription()
    {
        echo ', <b>вид:</b> '.$this->species.', <b>имя:</b> '.$this->name;
    }
}
