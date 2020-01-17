<?php
require_once('class.collection.php');
require_once("observable.php");
require_once("abstract_widget.php");
class Foo{

  private $_name;
  private $_number;

  public function __construct($name, $number){
    $this->_name = $name;
    $this->_number = $number;
  }

  public function __toString() {
    return $this->_name . ' is number ' . $this->_number;
  }

}

$dat = new DataSource();
$data = new DataSource2();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new BlackWidget();
$widgetD = new aWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$data->addObserver($widgetC);
$data->addObserver($widgetD);

$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$data->addRecord("Pizza", "8.00€", 1,"21%","9.68€");
$data->addRecord("Espaguetis", "5.00€", 1,"21%","6.05€");
$data->addRecord("Cerveza", "3.00€", 1,"21%","3.63€");
$data->addRecord("Cafe", "2.00€", 1,"21%","2.42€");

$modelo = new Collection();
$modelo->addItem($dat,'datos');
$modelo->addItem($data,'datos2');

$widget = new Collection();
$widget ->addItem($widgetC,'widgetC');
$widget ->addItem($widgetD,'widgetD');
$widget ->addItem($widgetA,'widgetA');
$widget ->addItem($widgetB,'widgetB');


$widget1 = $widget->getItem("widgetA");
$widget2 = $widget->getItem("widgetB");
$widget3 = $widget->getItem("widgetC");
$widget4 = $widget->getItem("widgetD");

$modelo->getItem("datos")->addObserver($widget1);
$modelo->getItem("datos")->addObserver($widget2);
$modelo->getItem("datos2")->addObserver($widget3);
$modelo->getItem("datos2")->addObserver($widget4);





print $widget1->draw(); //prints "Steve is number 14"
print $widget2->draw(); //prints "Steve is number 14"
print $widget3->draw(); //prints "Steve is number 14"
print $widget4->draw(); //prints "Steve is number 14"

//$colFoo->removeItem("steve"); //deletes the "steve" object

try {
  $objSteve = $widget->getItem("widgetZ"); //throws KeyInvalidException
} catch (KeyInvalidException $kie) {
  print "Thec collection doesn't contain anything called 'widgetZ'";
}