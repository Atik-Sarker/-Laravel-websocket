<?php

namespace App\Listeners;

use App\Events\ChatEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChatListener
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
    public function handle(ChatEvent $event)
    {
		info('=== SendTestNotification  ========');
    }
}
