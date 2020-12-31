<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return true;
    return (int) $user->id === (int) $id;
});

Broadcast::channel('channel-private', function ($user, $orderId) {
    return true;
});

Broadcast::channel('channel-push', function ($user) {
    return true; // just allow all authenticated users
});

Broadcast::channel('notitest', function ($user) {
    return true; // just allow all authenticated users
});
