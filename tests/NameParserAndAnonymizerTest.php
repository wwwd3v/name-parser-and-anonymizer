<?php

namespace Wwwd3v\NameParserAndAnonymizer\Tests;

use PHPUnit\Framework\TestCase;
use Wwwd3v\NameParserAndAnonymizer\NameParserAndAnonymizer;

class NameParserAndAnonymizerTest extends TestCase
{
    /** @test */
    public function simple_name_is_parsed_and_anonymized_and_transformed_to_string()
    {
        $nameParserAndAnonymizer = new NameParserAndAnonymizer();

        $name = (string) $nameParserAndAnonymizer->parse('John Steinbeck')->anonymize();

        $this->assertEquals('John S.', $name);
    }
}
