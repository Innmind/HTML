<?php
declare(strict_types = 1);

namespace Tests\Innmind\Html\Element;

use Innmind\Html\Element\Base;
use Innmind\Xml\{
    Element\SelfClosingElement,
    Attribute,
};
use Innmind\Url\Url;
use Innmind\Immutable\Set;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(
            SelfClosingElement::class,
            $base = new Base(
                $href = Url::of('http://example.com'),
                Set::of(Attribute::class),
            )
        );
        $this->assertSame('base', $base->name());
        $this->assertSame($href, $base->href());
    }

    public function testWithoutAttributes()
    {
        $this->assertTrue(
            (new Base(Url::of('http://example.com')))->attributes()->empty(),
        );
    }
}
