<?php

namespace Wwwd3v\NameParserAndAnonymizer;

abstract class NameStructure
{
    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
