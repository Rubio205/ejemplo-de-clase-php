<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\MixedArrayCreator;

class MixedArrayCreatorTest extends TestCase
{
    private MixedArrayCreator $creator;

    protected function setUp(): void
    {
        $this->creator = new MixedArrayCreator();
    }

    /**
     * Test creating mixed array with correct values
     */
    public function testCreateMixedArray(): void
    {
        $expected = [
            true,
            42,
            3.14,
            "PHP",
            [],
            null
        ];
        
        $result = $this->creator->createMixedArray();
        
        $this->assertEquals($expected, $result, 'El array debe contener exactamente los 6 elementos especificados');
    }

    /**
     * Test array has correct count
     */
    public function testArrayCount(): void
    {
        $result = $this->creator->createMixedArray();
        $this->assertCount(6, $result, 'El array debe tener exactamente 6 elementos');
    }

    /**
     * Test each element has correct type
     */
    public function testElementTypes(): void
    {
        $result = $this->creator->createMixedArray();
        
        $this->assertTrue(is_bool($result[0]), 'Elemento 0 debe ser boolean');
        $this->assertTrue(is_int($result[1]), 'Elemento 1 debe ser integer');
        $this->assertTrue(is_float($result[2]), 'Elemento 2 debe ser float');
        $this->assertTrue(is_string($result[3]), 'Elemento 3 debe ser string');
        $this->assertTrue(is_array($result[4]), 'Elemento 4 debe ser array');
        $this->assertTrue(is_null($result[5]), 'Elemento 5 debe ser null');
    }

    /**
     * Test each element has correct value
     */
    public function testElementValues(): void
    {
        $result = $this->creator->createMixedArray();
        
        $this->assertSame(true, $result[0], 'Elemento 0 debe ser true');
        $this->assertSame(42, $result[1], 'Elemento 1 debe ser 42');
        $this->assertSame(3.14, $result[2], 'Elemento 2 debe ser 3.14');
        $this->assertSame("PHP", $result[3], 'Elemento 3 debe ser "PHP"');
        $this->assertSame([], $result[4], 'Elemento 4 debe ser array vacío');
        $this->assertSame(null, $result[5], 'Elemento 5 debe ser null');
    }
}
