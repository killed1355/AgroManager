<?php

require_once __DIR__ . '/Plant.php';

class Wheat extends Plant
{
    protected function handleDeath(): void
    {
        echo "Пшеница {$this->getName()} погибла.\n";
    }
}