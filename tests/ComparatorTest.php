<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\Comparator;

class ComparatorTest extends TestCase
{
    private Comparator $comparator;

    protected function setUp(): void
    {
        $this->comparator = new Comparator();
    }

    /**
     * Test strict comparison with same type and value
     */
    public function testStrictEqualsSameTypeAndValue(): void
    {
        $this->assertTrue($this->comparator->strictEquals(42, 42));
        $this->assertTrue($this->comparator->strictEquals('PHP', 'PHP'));
        $this->assertTrue($this->comparator->strictEquals(true, true));
        $this->assertTrue($this->comparator->strictEquals(false, false));
        $this->assertTrue($this->comparator->strictEquals(null, null));
    }

    /**
     * Test strict comparison with different types (should be false)
     */
    public function testStrictEqualsDifferentTypes(): void
    {
        $this->assertFalse($this->comparator->strictEquals(42, '42'), '42 y "42" tienen diferentes tipos');
        $this->assertFalse($this->comparator->strictEquals(true, 1), 'true y 1 tienen diferentes tipos');
        $this->assertFalse($this->comparator->strictEquals(false, 0), 'false y 0 tienen diferentes tipos');
        $this->assertFalse($this->comparator->strictEquals(null, ''), 'null y "" tienen diferentes tipos');
        $this->assertFalse($this->comparator->strictEquals(0, '0'), '0 y "0" tienen diferentes tipos');
    }

    /**
     * Test loose comparison with same value (can be different types)
     */
    public function testLooseEqualsSameValue(): void
    {
        $this->assertTrue($this->comparator->looseEquals(42, 42));
        $this->assertTrue($this->comparator->looseEquals('PHP', 'PHP'));
        
        // These should be true with loose comparison
        $this->assertTrue($this->comparator->looseEquals(42, '42'), 'Comparación suave: 42 == "42"');
        $this->assertTrue($this->comparator->looseEquals(true, 1), 'Comparación suave: true == 1');
        $this->assertTrue($this->comparator->looseEquals(false, 0), 'Comparación suave: false == 0');
        $this->assertTrue($this->comparator->looseEquals(null, ''), 'Comparación suave: null == ""');
        $this->assertTrue($this->comparator->looseEquals(0, '0'), 'Comparación suave: 0 == "0"');
    }

    /**
     * Test loose comparison with different values (should still be false)
     */
    public function testLooseEqualsDifferentValues(): void
    {
        $this->assertFalse($this->comparator->looseEquals(42, 43));
        $this->assertFalse($this->comparator->looseEquals('PHP', 'JAVA'));
        $this->assertFalse($this->comparator->looseEquals(true, false));
        $this->assertFalse($this->comparator->looseEquals(1, 2));
    }
}
