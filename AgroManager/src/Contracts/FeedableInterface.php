<?php

namespace AgroManager\Contracts;

interface FeedableInterface
{
    public function feed(float $kg): void;
}
