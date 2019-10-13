<?php


namespace Billing\Domain\Support;

trait ObjectEventsTrait
{
    private $events;

    protected function registerThat($event): self
    {
        $this->events[] = $event;
    }

    public function flushEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

}