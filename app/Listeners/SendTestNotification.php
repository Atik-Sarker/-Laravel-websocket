<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTestNotification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->data = $p;
    }

    /**
     * Handle the event.
     *
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
		info('=== SendTestNotification  ========');
    }
}
