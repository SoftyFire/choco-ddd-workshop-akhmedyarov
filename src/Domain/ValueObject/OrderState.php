<?php

namespace Billing\Domain\ValueObject;

use Billing\Domain\Aggregate\Order;
use Finite\State\State;
use Finite\StateMachine\StateMachine;

final class OrderState
{
    public const CREATED = 'created';
    public const PROCESSING = 'processing';
    public const FAILED = 'failed';
    public const PAID = 'paid';
    public const REFUNDED = 'refunded';

    public const GO_PROCESS = 'process';
    public const GO_PAID = 'pay';
    // TODO: more tansitions
    /**
     * @var StateMachine
     */
    private $machine;

    public function __construct(Order $order)
    {
        $machine = new StateMachine();
        $machine->addState(new State(self::CREATED, State::TYPE_INITIAL));
        $machine->addState(new State(self::PROCESSING));
        $machine->addState(new State(self::PAID, State::TYPE_NORMAL));
        $machine->addState(new State(self::FAILED));
        $machine->addState(new State(self::REFUNDED));


        $machine->addTransition(self::GO_PROCESS, self::CREATED, self::PROCESSING);
        $machine->addTransition(self::GO_PAID, self::PROCESSING, self::PAID);
        // TODO: implement more

        $machine->setObject($order);
        $this->machine = $machine;
    }

    public function __invoke(): State
    {
        $this->machine->initialize();
        return $this->machine->getCurrentState();
    }
}
