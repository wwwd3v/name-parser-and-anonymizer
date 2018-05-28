<?php

namespace Wwwd3v\NameParserAndAnonymizer\Tests;

use PHPUnit\Framework\TestCase;
use Wwwd3v\NameParserAndAnonymizer\Name;

class NameTest extends TestCase
{
    /** @test */
    public function simple_name_is_parsed()
    {
        $name = new Name('John Steinbeck');

        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals('Steinbeck', $name->getLastName());
    }
}
