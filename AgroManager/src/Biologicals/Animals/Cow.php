<?php

namespace AgroManager\Biologicals\Animals;

use AgroManager\Biologicals\Biological;
use AgroManager\Contracts\FeedableInterface;

class Cow extends Biological implements FeedableInterface
{
    private float $milk = 0.0;

    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new \InvalidArgumentException('Количество корма не может быть отрицательным');
        }

        $this->changeHealth($kg * 0.3);
        $this->milk += $kg * 0.5;
    }

    public function milk(): float
    {
        $milk = $this->milk;
        $this->milk = 0.0;

        return $milk;
    }

    public function getMilk(): float
    {
        return $this->milk;
    }

    protected function handleDeath(): void
    {
        echo "Корова {$this->getName()} погибла.\n";
    }
}
