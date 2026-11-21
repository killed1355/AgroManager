<?php

require_once __DIR__ . '/../Biological.php';
require_once __DIR__ . '/../../Contracts/Feedableinterface.php';

class Cow extends Biological implements Feedableinterface
{
    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new InvalidArgumentException('Количество корма не может быть отрицательным');
        }

        $this->changeHealth($kg * 0.3);
    }

    protected function handleDeath(): void
    {
        echo "Корова {$this->getName()} погибла.\n";
    }
}