<?php
declare(strict_types=1);

namespace Billing\Domain\Event;

use Billing\Domain\Aggregate\Merchant;

final class MerchantWasCreated
{
    private $id;

    public static function occurred(Merchant $merchant): self
    {
        $self = new self();
        $self->id = $merchant->id();

        return $self;
    }
}
