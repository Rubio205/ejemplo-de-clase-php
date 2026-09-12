<?php

namespace Exercises;

class TypeIdentifier {
    public function getDatatype($variable) {
        return gettype($variable);
    }
}