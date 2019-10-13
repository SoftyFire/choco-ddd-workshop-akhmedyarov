<?php


namespace Billing\Domain\Events;


use Billing\Domain\Aggregate\Customer;

final class CustomerWasRegistered
{
    private $id;

    public static function occured(Customer $customer): self
    {
        $self = new self();
        $self->id = $customer->id();

        return $self;
    }

}