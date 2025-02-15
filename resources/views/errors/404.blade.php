@extends('errors.layout')
@section('content')
<div class="custom-bg text-dark">
    <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
        <div class="text-center">
            <h1 class="display-1 fw-bold">{{ $exception->getStatusCode() }}</h1>
            <p class="fs-2 fw-medium mt-4">{{ $exception->getMessage() }}</p>
        </div>
    </div>
</div>
@endsection