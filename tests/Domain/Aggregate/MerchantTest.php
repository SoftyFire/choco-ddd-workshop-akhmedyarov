<?php


namespace Billing\Tests\Domain\Aggregate;

use Billing\Domain\Aggregate\Merchant;
use Billing\Domain\DTO\Merchant\MerchantRegistrationDto;
use Billing\Tests\Integration\TestCase;
use Ramsey\Uuid\Uuid;

class MerchantTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $dto = MerchantRegistrationDto::fromArray([
            'id' => Uuid::uuid4(),
            'name' => 'Smart Point'
        ]);
        $merchant = Merchant::register($dto);

        $this->assertEquals($dto->id, $merchant->id());
        $this->assertEquals($dto->name, $merchant->name());
    }
}
