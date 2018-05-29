<?php

namespace Wwwd3v\NameParserAndAnonymizer;

use Symfony\Component\OptionsResolver\OptionsResolver;

class AnonymizedName extends NameStructure
{
    /** @var array */
    private $options;

    /**
     * @param Name $name
     * @param array $options
     */
    public function __construct(Name $name, array $options = [])
    {
        $this->options = $this->resolveOptions($options);

        $this->firstName = $name->getFirstName();
        $this->middleNames = $this->decideOnMiddleNames(
            $name->getMiddleNames()
        );
        $this->lastName = $this->anonymize($name->getLastName());
    }

    /**
     * @param array $options
     * @return array
     */
    private function resolveOptions(array $options): array
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults([
            'middleNames' => 'discard',
        ]);

        $resolver->setAllowedValues('middleNames', ['keep', 'anonymize', 'discard']);

        return $resolver->resolve($options);
    }

    /**
     * @param array $middleNames
     * @return array
     */
    private function decideOnMiddleNames(array $middleNames): array
    {
        if ($this->options['middleNames'] === 'keep') {
            return $middleNames;
        }

        if ($this->options['middleNames'] === 'anonymize') {
            return array_map(
                function ($name) {
                    return $this->anonymize($name);
                },
                $middleNames
            );
        }

        return [];
    }

    /**
     * @param string $namePart
     * @return string
     */
    private function anonymize(string $namePart): string
    {
        return "$namePart[0].";
    }
}
