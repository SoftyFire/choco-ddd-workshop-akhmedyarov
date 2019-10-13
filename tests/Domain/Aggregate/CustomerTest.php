<?php


namespace Billing\Tests\Domain\Aggregate;

use Billing\Domain\Aggregate\Customer;
use Billing\Domain\DTO\Customer\CustomerRegistrationDto;
use Billing\Tests\Integration\TestCase;
use Ramsey\Uuid\Uuid;

class CustomerTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $dto = CustomerRegistrationDto::fromArray([
            'id' => Uuid::uuid4(),
            'phone' => '+7123456789'
        ]);
        $customer = Customer::register($dto);

        $this->assertEquals($dto->id, $customer->id());
        $this->assertEquals($dto->phone, (string)$customer->phone());
    }
}
