<?php

namespace Wwwd3v\NameParserAndAnonymizer;

class NameParserAndAnonymizer
{
    /**
     * @param string $name
     * @return Name
     */
    public function parse(string $name): Name
    {
        $name = new Name($name);

        return $name;
    }
}
