<?php

namespace Doctrine\Tests\Persistence\Proxy;

use Doctrine\Persistence\Proxy\DefaultProxyNamingInflector;
use Doctrine\Tests\DoctrineTestCase;

final class DefaultProxyNamingInflectorTest extends DoctrineTestCase
{
    /**
     * @dataProvider namesProvider()
     */
    public function test(string $originalName, $expectedName) : void
    {
        self::assertSame($expectedName, (new DefaultProxyNamingInflector())->getRealClassName($originalName));
    }

    /**
     * @return string[][]
     */
    public function namesProvider() : iterable
    {
        yield ['Foo', 'Foo'];
        yield ['Foo', 'Foo'];
        yield ['__CG__\Foo', '__CG__\Foo'];
        yield ['Prefix\__CG__\Foo', 'Foo'];
        yield ['Prefix\AnotherPrefix\__CG__\Foo', 'Foo'];
        yield ['Prefix\__CG__\Middle\__CG__\Foo', 'Foo'];
    }
}
