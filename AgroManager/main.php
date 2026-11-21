<?php

require_once __DIR__ . '/Biologicals/Plants/Wheat.php';
require_once __DIR__ . '/Biologicals/Plants/Corn.php';
require_once __DIR__ . '/Biologicals/Animals/Cow.php';
require_once __DIR__ . '/Physicals/Equipments/Tractor.php';
require_once __DIR__ . '/Physicals/Equipments/Harvester.php';
require_once __DIR__ . '/Physicals/Equipments/Seeder.php';
require_once __DIR__ . '/Physicals/Equipments/IrrigationSystem.php';

echo "=== Biological ===\n";

$wheat = new Wheat('plant-1', 'Пшеница');
$corn  = new Corn('plant-2', 'Кукуруза');
$cow   = new Cow('animal-1', 'Бурёнка');

$wheat->feed(20.0);
$corn->changeHealth(-30.0);
$cow->feed(50.0);
$cow->changeHealth(-150.0); // смерть (здоровье обрезается до 0)

echo "Пшеница: {$wheat->getHealth()}\n";
echo "Кукуруза: {$corn->getHealth()}\n";
echo "Корова: {$cow->getHealth()}\n";

echo "\n=== Equipment ===\n";

$tractor    = new Tractor('eq-1', 'Трактор', 3500.0);
$harvester  = new Harvester('eq-2', 'Комбайн', 5200.0);
$seeder     = new Seeder('eq-3', 'Сеялка', 1200.0);
$irrigation = new IrrigationSystem('eq-4', 'Система полива', 800.0);

foreach ([$tractor, $harvester, $seeder, $irrigation] as $machine) {
    $machine->powerOn();
    $machine->work(10.0);
    echo "{$machine->getName()}: износ {$machine->wear}%, работает: "
        . ($machine->isPowered() ? 'да' : 'нет') . "\n";
    $machine->powerOff();
}