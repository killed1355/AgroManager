<?php

namespace AgroManager;

use AgroManager\Biologicals\Animals\Chicken;
use AgroManager\Biologicals\Animals\Cow;
use AgroManager\Biologicals\Animals\Sheep;
use AgroManager\Physicals\Equipments\Harvester;
use AgroManager\Physicals\Equipments\Seeder;
use AgroManager\Physicals\Equipments\Tractor;

require_once __DIR__ . '/../autoloader.php';

// создание животных
$Murka = new Cow(id: '1', name: 'Мурка', weight: 80.025);
$Tika = new Chicken(id: '1', name: 'Тика', weight: 65.565);
$Meme = new Sheep(id: '1', name: 'Мэмэ', woolAmount: 70.890);

// демонстрация уникальных свойств:
$Tika->layEgg();
$Tika->layEgg();
$Tika->layEgg();
echo 'Курица Тика снесла яиц: ' . $Tika->getEggsLaid() . "\n";

echo 'Шерсти у овцы Мэмэ до стрижки: ' . $Meme->getWoolAmount() . " кг\n";
$shearedWool = $Meme->shear();
echo 'Состригли: ' . $shearedWool . ' кг. Осталось: ' . $Meme->getWoolAmount() . " кг\n";

// вывод животных
print_r($Murka);
print_r($Tika);
print_r($Meme);

// демонстрация оборудования
echo "\nEquipment \n";

$tractor = new Tractor('eq-1', 'Трактор', 3500.0);
$harvester = new Harvester('eq-2', 'Комбайн', 5200.0);
$seeder = new Seeder('eq-3', 'Сеялка', 1200.0);

foreach ([$tractor, $harvester, $seeder] as $machine) {
    $machine->powerOn();
    $machine->work(10.0);
    echo "{$machine->getName()}: износ {$machine->wear}%, работает: "
        . ($machine->isPowered() ? 'да' : 'нет') . "\n";
    $machine->powerOff();
}
