<?php

namespace Wwwd3v\NameParserAndAnonymizer\Tests;

use PHPUnit\Framework\TestCase;
use Wwwd3v\NameParserAndAnonymizer\AnonymizedName;
use Wwwd3v\NameParserAndAnonymizer\Name;

class AnonymizedNameTest extends TestCase
{
    /** @test */
    public function simple_name_is_anonymized()
    {
        $anonymizedName = new AnonymizedName(
            new Name('John Steinbeck')
        );

        $this->assertEquals('John', $anonymizedName->getFirstName());
        $this->assertEquals([], $anonymizedName->getMiddleNames());
        $this->assertEquals('S.', $anonymizedName->getLastName());
        $this->assertEquals('John S.', (string) $anonymizedName);
    }

    /** @test */
    public function compound_name_is_anonymized()
    {
        $anonymizedName = new AnonymizedName(
            new Name('John Ronald Reuel Tolkien')
        );

        $this->assertEquals('John', $anonymizedName->getFirstName());
        $this->assertEquals([], $anonymizedName->getMiddleNames());
        $this->assertEquals('T.', $anonymizedName->getLastName());
        $this->assertEquals('John T.', (string) $anonymizedName);
    }
}
