@extends('layouts.app')
@section('content')

@php
    $states = [
        'Gujarat',
        'Rajasthan',
    ];

    $cities = [
        'Ahmedabad',
        'morbi',
        'surat'
    ];
@endphp
<form action="{{ route('view') }}" method="post" class="p-5">
    @csrf
    @method('post')
    <x-forms.input id="name" labelTitle="Name" type="text" name="$name" required/>
    <x-forms.input id="email" labelTitle="email" type="text" name="email"/>
    <x-forms.textarea id="content" labelTitle="content" name="content"/>
    <x-forms.select id="state" labelTitle="state" name="state" :options="$states"/>
    <x-forms.select id="city" labelTitle="city" name="city" :options="$cities"/>

    <x-forms.input id="are_you_agree" labelTitle="Are you agree?" type="checkbox" name="are_you_agree"/>

    <button class="btn btn-primary">Submit</button>
</form>
@endsection
