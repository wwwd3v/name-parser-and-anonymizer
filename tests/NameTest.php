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
        $this->assertEquals([], $name->getMiddleNames());
        $this->assertEquals('Steinbeck', $name->getLastName());
        $this->assertEquals('John Steinbeck', (string) $name);
    }

    /** @test */
    public function compound_name_is_parsed()
    {
        $name = new Name('John Ronald Reuel Tolkien');

        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals(['Ronald', 'Reuel'], $name->getMiddleNames());
        $this->assertEquals('Tolkien', $name->getLastName());
        $this->assertEquals('John Ronald Reuel Tolkien', (string) $name);
    }

    /** @test */
    public function excessive_whitespace_is_trimmed()
    {
        $name = new Name(' John   Ronald    Reuel           Tolkien  ');

        $this->assertEquals('John', $name->getFirstName());
        $this->assertEquals(['Ronald', 'Reuel'], $name->getMiddleNames());
        $this->assertEquals('Tolkien', $name->getLastName());
        $this->assertEquals('John Ronald Reuel Tolkien', (string) $name);
    }
}
