<?php

namespace App\Listeners;

use App\Events\NewPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendArticleNotification implements shouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPublished  $event
     * @return void
     */
    public function handle(NewPublished $event)
    {
        //$event->article->subscribers->forEach
        var_dump($event->article['name']. 'was published a new article');
    }
}
