<?php

namespace AgroManager\Biologicals\Plants;

class Wheat extends Plant
{
    protected function handleDeath(): void
    {
        echo "Пшеница {$this->getName()} погибла.\n";
    }
}
