<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\TypeIdentifier;
use stdClass;

class TypeIdentifierTest extends TestCase
{
    private TypeIdentifier $typeIdentifier;

    protected function setUp(): void
    {
        $this->typeIdentifier = new TypeIdentifier();
    }

    /**
     * Test gettype() functionality with boolean
     */
    public function testGetDataTypeBoolean(): void
    {
        $this->assertEquals('boolean', $this->typeIdentifier->getDataType(true));
        $this->assertEquals('boolean', $this->typeIdentifier->getDataType(false));
    }

    /**
     * Test gettype() functionality with integer
     */
    public function testGetDataTypeInteger(): void
    {
        $this->assertEquals('integer', $this->typeIdentifier->getDataType(42));
        $this->assertEquals('integer', $this->typeIdentifier->getDataType(0));
        $this->assertEquals('integer', $this->typeIdentifier->getDataType(-10));
    }

    /**
     * Test gettype() functionality with float (returns 'double')
     */
    public function testGetDataTypeFloat(): void
    {
        $this->assertEquals('double', $this->typeIdentifier->getDataType(3.14));
        $this->assertEquals('double', $this->typeIdentifier->getDataType(0.0));
        $this->assertEquals('double', $this->typeIdentifier->getDataType(-2.5));
    }

    /**
     * Test gettype() functionality with string
     */
    public function testGetDataTypeString(): void
    {
        $this->assertEquals('string', $this->typeIdentifier->getDataType('PHP'));
        $this->assertEquals('string', $this->typeIdentifier->getDataType(''));
        $this->assertEquals('string', $this->typeIdentifier->getDataType('0'));
    }

    /**
     * Test gettype() functionality with array
     */
    public function testGetDataTypeArray(): void
    {
        $this->assertEquals('array', $this->typeIdentifier->getDataType([]));
        $this->assertEquals('array', $this->typeIdentifier->getDataType([1, 2, 3]));
        $this->assertEquals('array', $this->typeIdentifier->getDataType(['key' => 'value']));
    }

    /**
     * Test gettype() functionality with object
     */
    public function testGetDataTypeObject(): void
    {
        $this->assertEquals('object', $this->typeIdentifier->getDataType(new stdClass()));
        $this->assertEquals('object', $this->typeIdentifier->getDataType($this));
    }

    /**
     * Test gettype() functionality with NULL
     */
    public function testGetDataTypeNull(): void
    {
        $this->assertEquals('NULL', $this->typeIdentifier->getDataType(null));
    }
}
