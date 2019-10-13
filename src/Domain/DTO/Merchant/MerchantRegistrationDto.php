<?php
declare(strict_types=1);

namespace Billing\Domain\DTO\Merchant;


use Ramsey\Uuid\UuidInterface;
use Webmozart\Assert\Assert;

final class MerchantRegistrationDto
{

    /**
     * @var UuidInterface
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    public static function fromArray(array $array): self
    {
        $self = new self();

        Assert::notEmpty($array['id']);
        Assert::notEmpty($array['name']);

        $self->id = $array['id'];
        $self->name = $array['name'];

        return $self;
    }

}