<?php

namespace Exercises;

class TypeChecker
{
    public function isBool($variable): bool
    {
        return is_bool($variable);
    }

    public function isInteger($variable): bool
    {
        return is_int($variable);
    }

    public function isFloat($variable): bool
    {
        return is_float($variable);
    }

    public function isString($variable): bool
    {
        return is_string($variable);
    }

    public function isArray($variable): bool
    {
        return is_array($variable);
    }

    public function isObject($variable): bool
    {
        return is_object($variable);
    }

    public function isNull($variable): bool
    {
        return is_null($variable);
    }
}