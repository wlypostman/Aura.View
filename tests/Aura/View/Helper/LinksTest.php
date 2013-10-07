<?php
namespace Aura\View\Helper;

/**
 * Test class for Links.
 * Generated by PHPUnit on 2011-04-02 at 08:28:49.
 */
class LinksTest extends AbstractHelperTest
{
    public function test__invoke()
    {
        $links = new Links;
        $actual = $links();
        $this->assertInstanceOf('Aura\View\Helper\Links', $actual);
    }
    
    public function testAddAndGet()
    {
        $links = new Links;
        
        $escaper = $this->escape((object) [
            'prev' => [
                'rel' => 'prev',
                'href' => '/path/to/prev?this&that',
            ],
            'next' => [
                'rel' => 'next',
                'href' => '/path/to/next?this&that',
            ]
        ]);
        
        $links->add($escaper->prev);
        $links->add($escaper->next);
        
        $actual = $links->get();
        $expect = '    <link rel="prev" href="/path/to/prev?this&amp;that" />' . PHP_EOL
                . '    <link rel="next" href="/path/to/next?this&amp;that" />' . PHP_EOL;
       
        $this->assertSame($expect, $actual);
        
        // Check add and get via fluency as well.
        unset($links);
        
         $links = new Links;
         $actual = $links->add($escaper->prev)
                         ->add($escaper->next)
                         ->get();
         
         $this->assertSame($expect, $actual);
    }

    /**
     * @todo Implement testSetIndent().
     */
    public function testSetIndent()
    {
        $links = new Links;
        $links->setIndent('  ');
        
        $escaper = $this->escape((object) [
            'prev' => [
                'rel' => 'prev',
                'href' => '/path/to/prev?this&that',
            ],
            'next' => [
                'rel' => 'next',
                'href' => '/path/to/next?this&that',
            ]
        ]);
        
        $links->add($escaper->prev);
        $links->add($escaper->next);
        
        $actual = $links->get();
        $expect = '  <link rel="prev" href="/path/to/prev?this&amp;that" />' . PHP_EOL
                . '  <link rel="next" href="/path/to/next?this&amp;that" />' . PHP_EOL;
       
        $this->assertSame($expect, $actual);
    }
}
