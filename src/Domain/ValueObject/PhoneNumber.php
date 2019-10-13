<?php
declare(strict_types=1);

namespace Billing\Domain\ValueObject;

use Webmozart\Assert\Assert;

final class PhoneNumber
{
    /**
     * @var string
     */
    private $value;

    public function __toString()
    {
        return $this->value;
    }

    public static function fromString(string $sting): self
    {
        $self = new self();
        Assert::notEmpty($sting);
        Assert::regex($sting, '/\+7\d{9}/');
        $self->value = $sting;

        return $self;
    }
}
