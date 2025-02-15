@php
    $username = cache('username');
    if (!$username) {
        if (auth()->check()) {
            $user = App\Models\User::find(auth()->id());
            cache(['username' => $user->name], now()->addSeconds(30));
            $username = cache('username');
        }
    }
@endphp
<h1>This is navbar {{ $username ?? 'test' }}</h1>