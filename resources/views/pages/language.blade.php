@extends('layouts.app')
@section('content')
<h1>{{ trans('messages.hello') }}</h1>
<h1>{{ __('messages.hello') }}</h1>
<h1>@lang('messages.hello')</h1>
@endsection