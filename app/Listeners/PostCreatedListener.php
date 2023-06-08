<?php

namespace App\Listeners;

use App\Events\PostCreated;
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
        // Получаем созданный пост из события
        $post = $event->post;

        // Здесь вы можете добавить логику отправки электронной почты
        // Используя класс Mail, например:
        Mail::to('recipient@example.com')->send(new PostCreatedMail($post));
    }
}
