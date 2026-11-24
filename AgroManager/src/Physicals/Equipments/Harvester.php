<?php

namespace AgroManager\Physicals\Equipments;

class Harvester extends Equipment
{
    public function work(float $hours): void
    {
        if ($hours < 0.0) {
            throw new \InvalidArgumentException('Время работы не может быть отрицательным');
        }

        if (!$this->isPowered()) {
            throw new \RuntimeException('Сначала запустите комбайн');
        }

        $this->setWear(min(100.0, $this->wear + $hours * 0.8));
    }
}
