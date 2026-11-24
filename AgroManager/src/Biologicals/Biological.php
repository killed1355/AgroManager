<?php

namespace AgroManager\Biologicals;

use AgroManager\Entity;

abstract class Biological extends Entity
{
    protected float $health = 100.0;
    protected float $weight;

    public function __construct(string $id, string $name, float $weight = 0.0)
    {
        parent::__construct($id, $name);

        if ($weight < 0) {
            throw new \InvalidArgumentException('Вес не может быть отрицательным');
        }

        $this->weight = $weight;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getHealth(): float
    {
        return $this->health;
    }

    public function changeHealth(float $delta): void
    {
        $this->health = min(100.0, max(0.0, $this->health + $delta));

        if ($this->health === 0.0) {
            $this->handleDeath();
        }
    }

    abstract protected function handleDeath(): void;
}
