<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Billing\Domain\DTO\Merchant\MerchantRegistrationDto;
use Billing\Domain\Event\MerchantWasCreated;
use Billing\Domain\Support\ObjectEventsTrait;
use Ramsey\Uuid\UuidInterface;

final class Merchant
{
    use ObjectEventsTrait;

    /**
     * @var UuidInterface
     */
    private $id;

    /** @var string */
    private $name;

    public static function register(MerchantRegistrationDto $dto): self
    {
        $self = new self();
        $self->id = $dto->id;
        $self->name = $dto->name;

        $self->registerThat(
            MerchantWasCreated::occurred($self)
        );

        return $self;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

}
