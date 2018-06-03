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
        // Excessive whitespace is exploded into empty strings which we remove.
        $names = array_values(
            array_filter(explode(' ', $name))
        );

        $firstName = $names[0];
        $middleNames = array_slice($names, 1, count($names) - 2);
        $lastName = $names[count($names) - 1];

        return [$firstName, $middleNames, $lastName];
    }
}
