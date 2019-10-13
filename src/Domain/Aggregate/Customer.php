<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Billing\Domain\DTO\Customer\CustomerRegistrationDto;
use Billing\Domain\Event\CustomerWasRegistered;
use Billing\Domain\Support\ObjectEventsTrait;
use Billing\Domain\ValueObject\PhoneNumber;
use Ramsey\Uuid\UuidInterface;

final class Customer
{
    use ObjectEventsTrait;

    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @var PhoneNumber
     */
    private $phone;

    public static function register(CustomerRegistrationDto $dto): self
    {
        $self = new self();
        $self->uuid = $dto->id;
        $self->phone = $dto->phone;

        $self->registerThat(CustomerWasRegistered::occurred($self));

        return $self;
    }

    public function id(): UuidInterface
    {
        return $this->uuid;
    }

    public function phone(): PhoneNumber
    {
        return $this->phone;
    }
}
