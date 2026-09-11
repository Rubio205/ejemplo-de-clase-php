<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Exercises\Debugger;

class DebuggerTest extends TestCase
{
    private Debugger $debugger;

    protected function setUp(): void
    {
        $this->debugger = new Debugger();
    }

    /**
     * Test var_dump capture with integer
     */
    public function testGetVarDumpInteger(): void
    {
        $result = $this->debugger->getVarDump(42);
        $this->assertStringContainsString('int(42)', $result, 'La salida debe contener "int(42)"');
    }

    /**
     * Test var_dump capture with string
     */
    public function testGetVarDumpString(): void
    {
        $result = $this->debugger->getVarDump('PHP');
        $this->assertStringContainsString('string(3) "PHP"', $result, 'La salida debe contener información del string');
    }

    /**
     * Test var_dump capture with boolean
     */
    public function testGetVarDumpBoolean(): void
    {
        $result = $this->debugger->getVarDump(true);
        $this->assertStringContainsString('bool(true)', $result, 'La salida debe contener "bool(true)"');
        
        $result = $this->debugger->getVarDump(false);
        $this->assertStringContainsString('bool(false)', $result, 'La salida debe contener "bool(false)"');
    }

    /**
     * Test var_dump capture with null
     */
    public function testGetVarDumpNull(): void
    {
        $result = $this->debugger->getVarDump(null);
        $this->assertStringContainsString('NULL', $result, 'La salida debe contener "NULL"');
    }

    /**
     * Test var_dump capture with array
     */
    public function testGetVarDumpArray(): void
    {
        $result = $this->debugger->getVarDump([1, 2, 3]);
        $this->assertStringContainsString('array(3)', $result, 'La salida debe contener "array(3)"');
    }

    /**
     * Test var_dump capture with float
     */
    public function testGetVarDumpFloat(): void
    {
        $result = $this->debugger->getVarDump(3.14);
        $this->assertStringContainsString('float(3.14)', $result, 'La salida debe contener información del float');
    }

    /**
     * Test that output is captured as string (not printed)
     */
    public function testOutputIsCaptured(): void
    {
        ob_start();
        $result = $this->debugger->getVarDump(42);
        $output = ob_get_clean();
        
        $this->assertEmpty($output, 'No debe haber output directo');
        $this->assertIsString($result, 'El resultado debe ser un string');
        $this->assertNotEmpty($result, 'El resultado no debe estar vacío');
    }
}
