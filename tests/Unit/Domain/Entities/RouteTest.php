<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Route;
use Tests\TestCase;

#[CoversClass(Route::class)]
class RouteTest extends TestCase
{
    public function testRouteCreation()
    {
        $route = new Route();
        $route->id = 1;
        $route->source = 'source';
        $route->destination = 'destination';

        $this->assertEquals(1, $route->id);
        $this->assertEquals('source', $route->source);
        $this->assertEquals('destination', $route->destination);
    }
}
