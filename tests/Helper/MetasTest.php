<?php
namespace Aura\View\Helper;

/**
 * Test class for Metas.
 * Generated by PHPUnit on 2011-04-02 at 08:28:56.
 */
class MetasTest extends \PHPUnit_Framework_TestCase
{
    public function test__invoke()
    {
        $metas = new Metas;
        $actual = $metas();
        $this->assertInstanceOf('Aura\View\Helper\Metas', $actual);
    }
    
    /**
     * @todo Implement test__invoke().
     */
    public function testAddAndGet()
    {
        $metas = new Metas;
        
        $metas->addHttp('Location', '/redirect/to/here');
        $metas->addName('foo', 'bar');
        
        $actual = $metas->get();
        $expect = '    <meta http-equiv="Location" content="/redirect/to/here" />' . PHP_EOL
                . '    <meta name="foo" content="bar" />' . PHP_EOL;
        
        $this->assertSame($expect, $actual);
    }

    /**
     * @todo Implement testSetIndent().
     */
    public function testSetIndent()
    {
        $metas = new Metas;
        $metas->setIndent('  ');
        $metas->addHttp('Location', '/redirect/to/here');
        $metas->addName('foo', 'bar');
        
        $actual = $metas->get();
        $expect = '  <meta http-equiv="Location" content="/redirect/to/here" />' . PHP_EOL
                . '  <meta name="foo" content="bar" />' . PHP_EOL;
        
        $this->assertSame($expect, $actual);
    }
}
