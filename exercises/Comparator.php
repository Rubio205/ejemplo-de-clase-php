<?php

namespace Exercises;

class Comparator
{
    public function strictEquals($a, $b): bool
    {
        return $a === $b;
    }

    public function looseEquals($a, $b): bool
    {
        return $a == $b;
    }
}