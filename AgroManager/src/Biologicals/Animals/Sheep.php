<?php

namespace AgroManager\Biologicals\Animals;

use AgroManager\Biologicals\Biological;
use AgroManager\Contracts\FeedableInterface;

class Sheep extends Biological implements FeedableInterface
{
    private float $woolAmount = 0.0;

    public function __construct(string $id, string $name, float $woolAmount = 0.0)
    {
        parent::__construct($id, $name, $woolAmount);

        if ($woolAmount < 0) {
            throw new \InvalidArgumentException('Количество шерсти не может быть отрицательным');
        }

        $this->woolAmount = $woolAmount;
    }

    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new \InvalidArgumentException('Количество корма не может быть отрицательным');
        }

        $this->changeHealth($kg * 0.25);
        $this->woolAmount += $kg * 0.1;
    }

    public function getWoolAmount(): float
    {
        return $this->woolAmount;
    }

    public function shear(): float
    {
        $wool = $this->woolAmount;
        $this->woolAmount = 0.0;

        return $wool;
    }

    protected function handleDeath(): void
    {
        echo "Овца {$this->getName()} погибла.\n";
    }
}
