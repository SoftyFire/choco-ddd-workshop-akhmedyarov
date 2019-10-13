<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Ramsey\Uuid\UuidInterface;

final class Merchant
{
    /**
     * @var UuidInterface
     */
    private $id;

    /** @var string */
    private $name;

    public static function register(MerchantRegistrationDto $dto): self
    {

    }
}
