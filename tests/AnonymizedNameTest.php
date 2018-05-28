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
        $this->assertEquals('S.', $anonymizedName->getLastName());
    }
}
