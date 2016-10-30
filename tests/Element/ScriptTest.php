<?php
declare(strict_types = 1);

namespace Tests\Innmind\Html\Element;

use Innmind\Html\Element\Script;
use Innmind\Xml\{
    Element\Element,
    Node\Text,
    AttributeInterface
};
use Innmind\Immutable\Map;

class ScriptTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $script = new Script(
            new Text('foo')
        );

        $this->assertInstanceOf(Element::class, $script);
        $this->assertSame('<script>foo</script>', (string) $script);
        $this->assertCount(1, $script->children());
    }

    public function testWithAttributes()
    {
        $script = new Script(
            new Text('foo'),
            $attributes = new Map('string', AttributeInterface::class)
        );

        $this->assertSame($attributes, $script->attributes());
    }
}