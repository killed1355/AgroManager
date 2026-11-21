<?php

require_once __DIR__ . '/Plant.php';

class Corn extends Plant
{
    protected function handleDeath(): void
    {
        echo "Кукуруза {$this->getName()} погибла.\n";
    }
}