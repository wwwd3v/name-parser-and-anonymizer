<?php

namespace Wwwd3v\NameParserAndAnonymizer;

abstract class NameStructure
{
    /** @var string */
    protected $firstName;

    /** @var array */
    protected $middleNames;

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
     * @return array
     */
    public function getMiddleNames(): array
    {
        return $this->middleNames;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    abstract public function __toString();
}
