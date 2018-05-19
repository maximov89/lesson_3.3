<?php

function vardump($var) {
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}
// Домашнее задание к лекции 3.2 <<Наследование и интерфейсы>>
echo '<p>1. Пространство имен - модель группировки имен, позволяющая создавать или использовать в коде классы, функции и константы с одинаковыми именами, но находящиеся в разных пространствах имен. Такая модель схожа с моделью построения директорий файловой системы, когда два файла с одинаковым именем не могут существовать в одной папке, но могут - если они лежат в разных. В PHP задается в самой верхней строке кода namespace Name.</p>';
echo '<p>2. Исключения - механизм, позволяющий обрабатывать любые ошибки программы так, как нам необходимо. В ходе выполнения программы важно отловить все возможные ошибки и обработать их соответственно, иначе программа будет "падать" при возникновении не учтенной ошибки или работать не так, как нам нужно.</p>';
spl_autoload_register(
    function($className) 
    {
        $path = rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR;
        $fullPath = $path . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($fullPath)) 
		{
            require $fullPath;
		}
	}
);

// Класс Автомобиль
echo '<h4>Автомобиль</h4>';
$bmwX6 = new Products\Category\Car('автомобиль', 3450000);
$bmwX6->setMake('BMW');
$bmwX6->setModel('X6');
$bmwX6->setColor('черный');
$audiQ7 = new Products\Category\Car('автомобиль', 3250000);
$audiQ7->setMake('Audi');
$audiQ7->setModel('Q7');
$audiQ7->setColor('белый');
$bmwX6->printFullDescription();
echo '<br/>';
$audiQ7->printFullDescription();
echo '<br/>';
echo '<br/>';

// Класс Телевизор
echo '<h4>Телевизор</h4>';
$samsung = new Products\Category\TV('телевизор', 32750);
$samsung->setMake('Samsung');
$samsung->setModel('UE40KU6300U');
$samsung->setSize(40);
$lg = new Products\Category\TV('телевизор', 28590);
$lg->setMake('LG');
$lg->setModel('LG 43UH619V');
$lg->setSize(43);
$samsung->printFullDescription();
echo '<br/>';
$lg->printFullDescription();
echo '<br/>';
echo '<br/>';

// Класс Шариковая ручка
echo '<h4>Шариковая ручка</h4>';
$parker = new Products\Category\Pen('шариковая ручка', 3499);
$parker->setInk('синяя');
$parker->setMake('Parker');
$zebra = new Products\Category\Pen('шариковая ручка', 1899);
$zebra->setInk('черная');
$parker->printFullDescription();
echo '<br/>';
$zebra->printFullDescription();
echo '<br/>';
echo '<br/>';

// Класс Утка
echo '<h4>Утка</h4>';
$duckDonald = new Products\Category\Duck('утка', '1000000');
$duckDonald->setSpecies('белый селезень с желтым клювом и желтыми лапами');
$duckDonald->setMake('Walt Disney');
$duckDonald->setModel('original');
$duckDonald->setName('Donald Duck');
$duckDaffy = new Products\Category\Duck('утка', '1000001');
$duckDaffy->setSpecies('черный селезень с желтым клювом и желтыми лапами');
$duckDaffy->setMake('Warner Brothers & Merrie Melodies');
$duckDaffy->setModel('original');
$duckDaffy->setName('Daffy Duck');
$duckDonald->printFullDescription();
echo '<br/>';
$duckDaffy->printFullDescription();
echo '<br/>';
echo '<br/>';
echo 'Количество созданных объектов: '.Products\Product::$staticProperty;
echo '<br/>';
echo '<br/>';

// Корзина
$basket = new Products\Basket();
$basket[] = $bmwX6;
$samsung->setPrice(NULL);
// echo $samsung->getPrice();
$basket[] = $samsung;
$basket[] = $parker;
$basket['утка'] = $duckDonald;
// unset($basket[2]);
echo "<h2>В корзине товаров на общую сумму: {$basket->getPriceProductsBasket()} руб.</h2>";

// Заказ
$order = new Products\Order($basket);
$order->getInfoOrder();
