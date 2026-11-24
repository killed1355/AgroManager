<?php

namespace AgroManager\Physicals\Equipments;

use AgroManager\Contracts\PoweredInterface;
use AgroManager\Physicals\Physical;

abstract class Equipment extends Physical implements PoweredInterface
{
    private bool $powered = false;

    public function powerOn(): void
    {
        if ($this->wear >= 100.0) {
            throw new \RuntimeException('Оборудование полностью изношено');
        }

        $this->powered = true;
    }

    public function powerOff(): void
    {
        $this->powered = false;
    }

    public function isPowered(): bool
    {
        return $this->powered;
    }

    abstract public function work(float $hours): void;
}
