<?php

namespace App\Events;

class ExampleEvent extends Event
{
    protected $listen = [
        'App\Events\ExampleEvent' => [
            'App\Listeners\ExampleListener',
        ],
    ];
    
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct()
    {
    }
}
