<?php


namespace Billing\Domain\ValueObject;


use Webmozart\Assert\Assert;

final class PhoneNumber
{

    private $value;

    public static function fromString(string $string): self
    {
        $self = new self();
        Assert::notEmpty($string);
        $self->value = $string;
        return $self;
    }

}