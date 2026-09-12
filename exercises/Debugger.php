<?php

namespace Exercises;

class Debugger
{
    public function getVarDump($variable): string
    {
        ob_start();
        var_dump($variable);
        return ob_get_clean();
    }
}