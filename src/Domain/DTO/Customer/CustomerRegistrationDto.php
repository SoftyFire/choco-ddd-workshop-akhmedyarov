<?php
declare(strict_types=1);


namespace Billing\Domain\DTO\Customer;

use Billing\Domain\ValueObject\PhoneNumber;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Webmozart\Assert\Assert;

final class CustomerRegistrationDto
{
    /**
     * @var UuidInterface
     */
    public $id;

    /**
     * @var PhoneNumber
     */
    public $phone;

    public static function fromArray(array $array): self
    {
        $self = new self();

        Assert::notEmpty($array['id']);
        Assert::notEmpty($array['phone']);

        $self->id = Uuid::fromString($array['id']);
        $self->phone = PhoneNumber::fromString($array['phone']);

        return $self;
    }
}
