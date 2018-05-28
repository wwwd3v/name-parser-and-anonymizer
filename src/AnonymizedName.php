<?php

namespace Wwwd3v\NameParserAndAnonymizer;

class AnonymizedName extends NameStructure
{
    /**
     * @param Name $name
     */
    public function __construct(Name $name)
    {
        $this->firstName = $name->getFirstName();
        $this->middleNames = [];
        $this->lastName = $this->anonymize($name->getLastName());
    }

    /**
     * @param string $namePart
     * @return string
     */
    private function anonymize(string $namePart): string
    {
        return "$namePart[0].";
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(' ', [
            $this->firstName,
            $this->lastName,
        ]);
    }
}
