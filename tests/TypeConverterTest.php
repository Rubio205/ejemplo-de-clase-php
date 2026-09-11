<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\TypeConverter;

class TypeConverterTest extends TestCase
{
    private TypeConverter $typeConverter;

    protected function setUp(): void
    {
        $this->typeConverter = new TypeConverter();
    }

    /**
     * Test boolean conversion - values that convert to TRUE
     */
    public function testConvertToBoolTrue(): void
    {
        $this->assertTrue($this->typeConverter->convertToBool(true));
        $this->assertTrue($this->typeConverter->convertToBool(1));
        $this->assertTrue($this->typeConverter->convertToBool(-1));
        $this->assertTrue($this->typeConverter->convertToBool(3.14));
        $this->assertTrue($this->typeConverter->convertToBool('PHP'));
        $this->assertTrue($this->typeConverter->convertToBool([1, 2, 3]));
    }

    /**
     * Test boolean conversion - values that convert to FALSE
     */
    public function testConvertToBoolFalse(): void
    {
        $this->assertFalse($this->typeConverter->convertToBool(false));
        $this->assertFalse($this->typeConverter->convertToBool(0));
        $this->assertFalse($this->typeConverter->convertToBool(0.0));
        $this->assertFalse($this->typeConverter->convertToBool(''));
        $this->assertFalse($this->typeConverter->convertToBool('0'));
        $this->assertFalse($this->typeConverter->convertToBool([]));
        $this->assertFalse($this->typeConverter->convertToBool(null));
    }

    /**
     * Test integer conversion
     */
    public function testConvertToInt(): void
    {
        $this->assertEquals(1, $this->typeConverter->convertToInt(true));
        $this->assertEquals(0, $this->typeConverter->convertToInt(false));
        $this->assertEquals(42, $this->typeConverter->convertToInt(42.7));
        $this->assertEquals(123, $this->typeConverter->convertToInt('123'));
        $this->assertEquals(123, $this->typeConverter->convertToInt('123abc'));
        $this->assertEquals(0, $this->typeConverter->convertToInt('abc'));
        $this->assertEquals(0, $this->typeConverter->convertToInt(null));
    }

    /**
     * Test float conversion
     */
    public function testConvertToFloat(): void
    {
        $this->assertEquals(1.0, $this->typeConverter->convertToFloat(true));
        $this->assertEquals(0.0, $this->typeConverter->convertToFloat(false));
        $this->assertEquals(42.0, $this->typeConverter->convertToFloat(42));
        $this->assertEquals(123.45, $this->typeConverter->convertToFloat('123.45'));
        $this->assertEquals(123.45, $this->typeConverter->convertToFloat('123.45abc'));
        $this->assertEquals(0.0, $this->typeConverter->convertToFloat('abc'));
        $this->assertEquals(0.0, $this->typeConverter->convertToFloat(null));
    }

    /**
     * Test string conversion
     */
    public function testConvertToString(): void
    {
        $this->assertEquals('1', $this->typeConverter->convertToString(true));
        $this->assertEquals('', $this->typeConverter->convertToString(false));
        $this->assertEquals('42', $this->typeConverter->convertToString(42));
        $this->assertEquals('3.14', $this->typeConverter->convertToString(3.14));
        $this->assertEquals('PHP', $this->typeConverter->convertToString('PHP'));
        $this->assertEquals('', $this->typeConverter->convertToString(null));
    }
}
