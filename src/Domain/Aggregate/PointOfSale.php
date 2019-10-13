<?php
declare(strict_types=1);

namespace Billing\Domain\Aggregate;

use Ramsey\Uuid\UuidInterface;

final class PointOfSale
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
     * @var CashbackPolicy
     */
    private $cashbackPolicy;

    public static function create(UuidInterface $id, Merchant $Merchant, CashbackPolicy $cashbackPolicy): self
    {

    }

}