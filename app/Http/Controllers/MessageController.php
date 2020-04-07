<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index() {
        return view('news.index');
    }

    public function show(Message $message) {
        if(!$message->isPublished()) {
            abort(404);
        }
        return view('news.show', ['news' => $message]);
    }

    public function latest() {
        $news = Message::published()
                         ->orderBy('published_at', 'desc')
                         ->take(3)
                         ->get();
        return $news;
    }

    public function all() {
        $news = Message::published()
                       ->orderBy('published_at', 'desc')
                       ->get();
        return $news;
    }
}
