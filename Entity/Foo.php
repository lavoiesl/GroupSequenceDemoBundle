<?php

namespace Acme\GroupSequenceDemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\GroupSequence({"FilledIn", "Foo"})
 */
class Foo
{
    private $value;

    private $checkValue;

    private $getValueCalled = false;

    public function __construct($value, $checkValue = false)
    {
        $this->value = $value;
        $this->checkValue = $checkValue;
    }

    /**
     * @Assert\NotNull(groups={"FilledIn"}, message="value should not be null")
     */
    public function getValue()
    {
        $this->getValueCalled = true;

        return $this->value;
    }

    /**
     * @Assert\True(groups={"Foo"}, message="is not == 2")
     */
    public function isTwo()
    {
        if (!$this->checkValue && null === $this->value) {
            throw new \RuntimeException(__FUNCTION__ . ' was called even if value is null. getValueCalled: ' . ($this->getValueCalled ? 'true' : 'false'));
        }

        return 2 == $this->getValue();
    }
}