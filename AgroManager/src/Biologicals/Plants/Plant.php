<?php

namespace AgroManager\Biologicals\Plants;

use AgroManager\Biologicals\Biological;
use AgroManager\Contracts\FeedableInterface;

abstract class Plant extends Biological implements FeedableInterface
{
    public function feed(float $kg): void
    {
        if ($kg < 0.0) {
            throw new \InvalidArgumentException('Количество питания не может быть отрицательным');
        }

        // растение восстанавливает здоровье от подкормки
        $this->changeHealth($kg * 0.5);
    }
}
