<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Money\Money;
use Ramsey\Uuid\UuidInterface;

final class Order
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Money
     */
    private $amount;

    /**
     * @var \DateTimeImmutable
     */
    private $create_time;

    private $status;

    public static function create(OrderCreationDto $dto): self
    {
        $self = new self();

        return $self;
    }

}