@extends('layouts.app')
@section('content')

<form action="{{ route('view') }}" method="post">
    @csrf
    @method('post')
    <x-input id="name" labelTitle="Name" type="text" name="name"/>
    <x-input id="email" labelTitle="email" type="text" name="email"/>
    <button class="btn btn-primary">Submit</button>
</form>
@endsection
