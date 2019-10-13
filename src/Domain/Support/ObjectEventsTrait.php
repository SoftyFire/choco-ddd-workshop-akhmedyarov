<?php

namespace Billing\Domain\Support;

trait ObjectEventsTrait
{
    private $events = [];

    protected function registerThat($event): void
    {
        $this->events[] = $event;
    }

    protected function flushEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
