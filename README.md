# Name Parser And Anonymizer

An easy to use name parser with **advanced and configurable** anonymization options. 

Inspired by the European Union's GDPR, this library is very useful for performing mandatory personal data anonymization.

## Getting Started

### Prerequisites

- PHP 7.2+
- Composer

### Installing

Simply install the composer package:

```
composer require wwwd3v/name-parser-and-anonymizer
```

Then, at some point in your code, 'new up' a `NameParserAndAnonymizer` class instance:

```php
use Wwwd3v\NameParserAndAnonymizer\NameParserAndAnonymizer;

//...

$parser = new NameParserAndAnonymizer();
```

## Parsing and anonymizing names

### Simple names

It is trivial to parse a simple name:

```php
$name = $parser->parse('John Steinbeck');

$name->getFirstName(); // 'John
$name->getLastName();  // 'Steinbeck'

(string) $name;        // 'John Steinbeck'
```

Anonymizing names is then very simple:

```php
$name = $parser->parse('John Steinbeck')->anonymize();

$name->getFirstName(); // 'John
$name->getLastName();  // 'S.'

(string) $name;        // 'John S.'
```

### Compound names

Middle names are parsed out and grouped in an array:

```php
$name = $parser->parse('John Ronald Reuel Tolkien');

$name->getFirstName();   // 'John
$name->getMiddleNames(); // ['Ronald', 'Reuel']
$name->getLastName();    // 'Tolkien'

(string) $name;        // 'John Ronald Reuel Tolkien'
```

As a part of the anonymization process, the middle names are dropped:

```php
$name = $parser->parse('John Ronald Reuel Tolkien')->anonymize();

$name->getFirstName();   // 'John
$name->getMiddleNames(); // []
$name->getLastName();    // 'T.'

(string) $name;        // 'John T.'
```

Optionally, you can decide to `keep` or `anonymize` the middle names (rather than to `discard` them):
```php
$name = $parser->parse('John Ronald Reuel Tolkien')->anonymize([
    'middleNames' => 'keep',
]);

(string) $name; // 'John Ronald Reuel T.'
```
```php
$name = $parser->parse('John Ronald Reuel Tolkien')->anonymize([
    'middleNames' => 'anonymize',
]);

(string) $name; // 'John R. R. T.'
```

## Edge cases

### Excessive whitespace

All the excessive whitespace is **automatically removed**. The resulting string representation of a parsed name **always** consists of names divided by a **single space** character:

```php
$name = $parser->parse(' John   Ronald    Reuel           Tolkien  ');

$name->getFirstName();   // 'John
$name->getMiddleNames(); // ['Ronald', 'Reuel']
$name->getLastName();    // 'Tolkien'

(string) $name;        // 'John Ronald Reuel Tolkien'
```

## Running the tests

Simply run the local phpunit:

```
./vendor/bin/phpunit
```

## Contributing

Just open an issue. We will decide on the implementation details and polish up the pull request together.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/wwwd3v/name-parser-and-anonymizer/tags). 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* European Union
