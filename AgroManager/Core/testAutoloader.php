<?php

declare(strict_types=1);

require_once __DIR__ . '/Autoloader.php';

$loader = new \Core\Autoloader();
$loader->addNamespace('AgroManager', dirname(__DIR__) . '/src');
$loader->addNamespace('Core', __DIR__);
$loader->register();

$classes = [
    'AgroManager\Entity',
    'AgroManager\Physicals\Physical',
    'AgroManager\Biologicals\Biological',
    'AgroManager\Biologicals\Animals\Cow',
    'AgroManager\Biologicals\Animals\Chicken',
    'AgroManager\Biologicals\Animals\Sheep',
    'AgroManager\Physicals\Equipments\Equipment',
    'AgroManager\Physicals\Equipments\Tractor',
];

foreach ($classes as $class) {
    printf("%-50s %s\n", $class, class_exists($class) ? 'OK' : 'FAIL');
}
