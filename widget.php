<?php
require_once("observable.php");
require_once("abstract_widget.php");

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



$widgetA->draw();
$widgetB->draw();
$widgetC->draw();
$widgetD->draw();
?>
