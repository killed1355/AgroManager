<?php

namespace AgroManager\Biologicals\Plants;

class Corn extends Plant
{
    protected function handleDeath(): void
    {
        echo "Кукуруза {$this->getName()} погибла.\n";
    }
}
