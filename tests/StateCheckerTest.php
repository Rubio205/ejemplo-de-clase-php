<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\StateChecker;

class StateCheckerTest extends TestCase
{
    private StateChecker $stateChecker;

    protected function setUp(): void
    {
        $this->stateChecker = new StateChecker();
    }

    /**
     * Test isset functionality with defined values
     */
    public function testIsSetWithDefinedValues(): void
    {
        $defined = 'test';
        $this->assertTrue($this->stateChecker->isSet($defined), 'Variable definida debe retornar true');
        $this->assertTrue($this->stateChecker->isSet(''), 'String vacío está definido');
        $this->assertTrue($this->stateChecker->isSet(0), '0 está definido');
        $this->assertTrue($this->stateChecker->isSet(false), 'false está definido');
    }

    /**
     * Test isset functionality with null
     */
    public function testIsSetWithNull(): void
    {
        $undefined = null;
        $this->assertFalse($this->stateChecker->isSet($undefined), 'null debe retornar false');
    }

    /**
     * Test empty functionality with empty values
     */
    public function testIsEmptyWithEmptyValues(): void
    {
        $this->assertTrue($this->stateChecker->isEmpty(''), 'String vacío debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty(0), '0 debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty(0.0), '0.0 debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty('0'), '"0" debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty(null), 'null debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty(false), 'false debe ser empty');
        $this->assertTrue($this->stateChecker->isEmpty([]), 'Array vacío debe ser empty');
    }

    /**
     * Test empty functionality with non-empty values
     */
    public function testIsEmptyWithNonEmptyValues(): void
    {
        $this->assertFalse($this->stateChecker->isEmpty('PHP'), 'String con contenido no debe ser empty');
        $this->assertFalse($this->stateChecker->isEmpty(1), '1 no debe ser empty');
        $this->assertFalse($this->stateChecker->isEmpty(true), 'true no debe ser empty');
        $this->assertFalse($this->stateChecker->isEmpty([1, 2, 3]), 'Array con elementos no debe ser empty');
    }
}
