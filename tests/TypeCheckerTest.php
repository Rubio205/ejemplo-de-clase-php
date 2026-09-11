<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\TypeChecker;
use stdClass;

class TypeCheckerTest extends TestCase
{
    private TypeChecker $typeChecker;

    protected function setUp(): void
    {
        $this->typeChecker = new TypeChecker();
    }

    /**
     * Test boolean type checking
     */
    public function testIsBool(): void
    {
        $this->assertTrue($this->typeChecker->isBool(true));
        $this->assertTrue($this->typeChecker->isBool(false));
        $this->assertFalse($this->typeChecker->isBool(1));
        $this->assertFalse($this->typeChecker->isBool(0));
        $this->assertFalse($this->typeChecker->isBool('true'));
        $this->assertFalse($this->typeChecker->isBool(null));
    }

    /**
     * Test integer type checking
     */
    public function testIsInteger(): void
    {
        $this->assertTrue($this->typeChecker->isInteger(42));
        $this->assertTrue($this->typeChecker->isInteger(0));
        $this->assertTrue($this->typeChecker->isInteger(-10));
        $this->assertFalse($this->typeChecker->isInteger(3.14));
        $this->assertFalse($this->typeChecker->isInteger('42'));
        $this->assertFalse($this->typeChecker->isInteger(true));
    }

    /**
     * Test float type checking
     */
    public function testIsFloat(): void
    {
        $this->assertTrue($this->typeChecker->isFloat(3.14));
        $this->assertTrue($this->typeChecker->isFloat(0.0));
        $this->assertTrue($this->typeChecker->isFloat(-2.5));
        $this->assertFalse($this->typeChecker->isFloat(42));
        $this->assertFalse($this->typeChecker->isFloat('3.14'));
        $this->assertFalse($this->typeChecker->isFloat(true));
    }

    /**
     * Test string type checking
     */
    public function testIsString(): void
    {
        $this->assertTrue($this->typeChecker->isString('PHP'));
        $this->assertTrue($this->typeChecker->isString(''));
        $this->assertTrue($this->typeChecker->isString('0'));
        $this->assertFalse($this->typeChecker->isString(42));
        $this->assertFalse($this->typeChecker->isString(true));
        $this->assertFalse($this->typeChecker->isString(null));
    }

    /**
     * Test array type checking
     */
    public function testIsArray(): void
    {
        $this->assertTrue($this->typeChecker->isArray([]));
        $this->assertTrue($this->typeChecker->isArray([1, 2, 3]));
        $this->assertTrue($this->typeChecker->isArray(['key' => 'value']));
        $this->assertFalse($this->typeChecker->isArray('array'));
        $this->assertFalse($this->typeChecker->isArray(42));
        $this->assertFalse($this->typeChecker->isArray(null));
    }

    /**
     * Test object type checking
     */
    public function testIsObject(): void
    {
        $this->assertTrue($this->typeChecker->isObject(new stdClass()));
        $this->assertTrue($this->typeChecker->isObject($this));
        $this->assertFalse($this->typeChecker->isObject('object'));
        $this->assertFalse($this->typeChecker->isObject([]));
        $this->assertFalse($this->typeChecker->isObject(null));
    }

    /**
     * Test NULL type checking
     */
    public function testIsNull(): void
    {
        $this->assertTrue($this->typeChecker->isNull(null));
        $this->assertFalse($this->typeChecker->isNull(false));
        $this->assertFalse($this->typeChecker->isNull(0));
        $this->assertFalse($this->typeChecker->isNull(''));
        $this->assertFalse($this->typeChecker->isNull([]));
    }
}
