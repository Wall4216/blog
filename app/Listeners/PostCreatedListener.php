<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;
        try {
            Mail::to('amirkhanovi04@mail.ru')->send(new PostCreatedMail($post));
        } catch (\Exception $e) {
            dd($e->getMessage());
        } }
}
