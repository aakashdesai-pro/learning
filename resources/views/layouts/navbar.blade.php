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
<h1>{{ trans('lang.this_is_navbar') }} {{ $username ?? 'test' }}</h1>

<form action="{{ route('change-language') }}" method="post">
    @csrf
    <x-forms.select labelTitle="Select Language" id="locale" name="locale" :options="
    [
        'en' => 'English',
        'gj' => 'Gujarati',
    ]" value="{{ session('locale') }}"/>
    <x-button variant="primary" title="Change language"/>
</form>