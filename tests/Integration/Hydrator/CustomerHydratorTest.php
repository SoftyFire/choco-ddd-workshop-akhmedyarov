<?php

namespace Billing\Tests\Integration\Hydrator;

use Billing\Domain\Aggregate\Invoice;
use Billing\Domain\Entity\LineItem;
use Billing\Infrastructure\Hydrator\CustomerHydrator;
use Billing\Infrastructure\Hydrator\InvoiceHydrator;
use Billing\Tests\Integration\TestCase;

/**
 * Class InvoiceHydrator
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
class CustomerHydratorTest extends TestCase
{
    /**
     * @var CustomerHydrator
     */
    protected $hydrator;

    protected function setUp()
    {
        parent::setUp();

        $this->hydrator = $this->container->get(CustomerHydrator::class);
    }

    public function testExtraction()
    {
    }
}
