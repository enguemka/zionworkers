<?php

namespace App\Mail;

use App\Post;
use App\Serie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $series, $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->series = $post->serie;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.series.updated')
            ->subject('New Episode added to ' . $this->series->title);
    }
}
