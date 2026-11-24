<?php

namespace AgroManager\Biologicals\Animals;

use AgroManager\Biologicals\Biological;
use AgroManager\Contracts\FeedableInterface;

class Chicken extends Biological implements FeedableInterface
{
    private int $eggsLaid = 0;

    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new \InvalidArgumentException('Количество корма не может быть отрицательным');
        }

        $this->changeHealth($kg * 0.2);
    }

    public function layEgg(): void
    {
        $this->eggsLaid++;
    }

    public function getEggsLaid(): int
    {
        return $this->eggsLaid;
    }

    protected function handleDeath(): void
    {
        echo "Курица {$this->getName()} погибла.\n";
    }
}
