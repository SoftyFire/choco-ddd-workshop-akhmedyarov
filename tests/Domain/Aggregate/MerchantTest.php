<?php


namespace Billing\Tests\Domain\Aggregate;

use Billing\Domain\Aggregate\Merchant;
use Billing\Domain\DTO\Merchant\MerchantRegistrationDto;
use Billing\Domain\Event\MerchantWasCreated;
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

        $events = $merchant->flushEvents();
        $found = false;
        foreach ($events as $event) {
            if ($event instanceof MerchantWasCreated) {
                $found = true;
                $this->assertTrue($merchant->id()->equals($event->merchantId()));
            }
        }

        $this->assertTrue($found, 'Was not found');
    }
}
