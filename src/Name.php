<?php

namespace Wwwd3v\NameParserAndAnonymizer;

class Name extends NameStructure
{
    /**
     * @param $name
     */
    public function __construct($name)
    {
        [$firstName, $middleNames, $lastName] = $this->splitIntoNames($name);

        $this->firstName = $firstName;
        $this->middleNames = $middleNames;
        $this->lastName = $lastName;
    }

    /**
     * @param array $options
     * @return AnonymizedName
     */
    public function anonymize(array $options = []): AnonymizedName
    {
        return new AnonymizedName($this, $options);
    }


    /**
     * @param string $name
     * @return array
     */
    private function splitIntoNames(string $name): array
    {
        $names = explode(' ', $name);

        $firstName = array_shift($names);
        $lastName = array_pop($names);
        $middleNames = $names;

        return [$firstName, $middleNames, $lastName];
    }

}
