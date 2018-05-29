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

    /** @test */
    public function compound_name_is_anonymized_and_keeps_middle_names()
    {
        $anonymizedName = new AnonymizedName(
            new Name('John Ronald Reuel Tolkien'),
            ['middleNames' => 'keep']
        );

        $this->assertEquals('John', $anonymizedName->getFirstName());
        $this->assertEquals(['Ronald', 'Reuel'], $anonymizedName->getMiddleNames());
        $this->assertEquals('T.', $anonymizedName->getLastName());
        $this->assertEquals('John Ronald Reuel T.', (string) $anonymizedName);
    }

    /** @test */
    public function compound_name_is_anonymized_and_anonymizes_middle_names()
    {
        $anonymizedName = new AnonymizedName(
            new Name('John Ronald Reuel Tolkien'),
            ['middleNames' => 'anonymize']
        );

        $this->assertEquals('John', $anonymizedName->getFirstName());
        $this->assertEquals(['R.', 'R.'], $anonymizedName->getMiddleNames());
        $this->assertEquals('T.', $anonymizedName->getLastName());
        $this->assertEquals('John R. R. T.', (string) $anonymizedName);
    }
}
