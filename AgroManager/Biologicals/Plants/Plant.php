<?php

require_once __DIR__ . '/../Biological.php';
require_once __DIR__ . '/../../Contracts/Feedableinterface.php';

abstract class Plant extends Biological implements Feedableinterface
{
    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new InvalidArgumentException('Количество питания не может быть отрицательным');
        }

        // растение восстанавливает здоровье от подкормки
        $this->changeHealth($kg * 0.5);
    }
}