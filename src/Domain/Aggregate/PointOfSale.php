<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Ramsey\Uuid\UuidInterface;

final class PointOfSale
{
    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var CashbackPolicy
     */
    private $cashbackPolicy;

    public static function create(UuidInterface $id, Merchant $merchant, CashbackPolicy $policy): self
    {

    }
}
