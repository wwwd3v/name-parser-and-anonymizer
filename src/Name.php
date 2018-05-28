<?php

namespace Wwwd3v\NameParserAndAnonymizer;

class Name extends NameStructure
{
    /**
     * @param $name
     */
    public function __construct($name)
    {
        [$firstName, $lastName] = $this->splitIntoNames($name);

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return AnonymizedName
     */
    public function anonymize(): AnonymizedName
    {
        return new AnonymizedName($this);
    }


    /**
     * @param string $name
     * @return array
     */
    private function splitIntoNames(string $name): array
    {
        $names = explode(' ', $name);

        $firstName = $names[0];
        $lastName = $names[1];

        return [$firstName, $lastName];
    }
}
