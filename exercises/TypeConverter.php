<?php

namespace Exercises;

class TypeConverter
{
    public function convertToBool($variable): bool
    {
        return (bool) $variable;
    }

    public function convertToInt($variable): int
    {
        return (int) $variable;
    }

    public function convertToFloat($variable): float
    {
        return (float) $variable;
    }

    public function convertToString($variable): string
    {
        return (string) $variable;
    }
}