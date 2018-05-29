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

    /** @test */
    public function compound_name_is_parsed_and_anonymized_and_transformed_to_string()
    {
        $nameParserAndAnonymizer = new NameParserAndAnonymizer();

        $name1 = (string) $nameParserAndAnonymizer->parse('John Ronald Reuel Tolkien')->anonymize();

        $name2 = (string) $nameParserAndAnonymizer->parse('John Ronald Reuel Tolkien')->anonymize([
            'middleNames' => 'keep',
        ]);

        $name3 = (string) $nameParserAndAnonymizer->parse('John Ronald Reuel Tolkien')->anonymize([
            'middleNames' => 'anonymize',
        ]);

        $this->assertEquals('John T.', $name1);
        $this->assertEquals('John Ronald Reuel T.', $name2);
        $this->assertEquals('John R. R. T.', $name3);
    }
}
