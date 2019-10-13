<?php


namespace Billing\Domain\ValueObject;


use Billing\Domain\Aggregate\Order;
use Finite\State\State;
use Finite\StateMachine\StateMachine;

final class OrderState
{

    const CREATED = 'created';
    const PROCESSING = 'processing';
    const PAID = 'paid';
    const FAILED = 'failed';
    const REFUNDED = 'refunded';

    const GO_PROCESS = 'process';
    const GO_PAID = 'paid';
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

        $this->machine = $machine;
        $machine->setObject($order);
    }

    public function __invoke()
    {
        $this->machine->initialize();
        return $this->machine->getCurrentState();
    }

}