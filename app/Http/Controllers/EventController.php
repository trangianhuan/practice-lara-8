<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Events\TestPushEvent;
use Event;

class EventController extends Controller
{
    public function index()
    {
        Event::dispatch(new TestPushEvent());
        dd(2);
    }
}
