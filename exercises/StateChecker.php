<?php

namespace Exercises;

class StateChecker
{
    public function isSet($variable): bool
    {
        return isset($variable);
    }

    public function isEmpty($variable): bool
    {
        return empty($variable);
    }
}