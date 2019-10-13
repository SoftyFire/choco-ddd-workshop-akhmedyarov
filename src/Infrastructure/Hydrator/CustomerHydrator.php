<?php

declare(strict_types=1);

namespace Billing\Infrastructure\Hydrator;

use Billing\Domain\Aggregate\Invoice;

/**
 * Class Custo
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
class CustomerHydrator extends BaseHydrator
{
    public function hydrate(array $data, $classNameOrObject)
    {
        // TODO: hydrate object
        throw new \InvalidArgumentException('Method ' . __METHOD__ . ' is not implemented yet.');

        return $object;
    }

    public function extract($object)
    {
        throw new \InvalidArgumentException('Method ' . __METHOD__ . ' is not implemented yet.');

        return [
            // TODO: extract data from object
        ];
    }
}
