<?php
declare(strict_types=1);

namespace Billing\Domain\DTO\Customer;


use Billing\Domain\ValueObject\PhoneNumber;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

final class CustomerRegistrationDto
{

    public $id;
    public $phone;

    public static function fromArray(array $array): self
    {
        $self = new self();

        Assert::notEmpty($array['id']);
        Assert::notEmpty($array['phone']);

        $self->id = Uuid::fromString($array['id']);
        $self->phone = PhoneNumber::fromString($array['phone']);

        new $self;
    }

}