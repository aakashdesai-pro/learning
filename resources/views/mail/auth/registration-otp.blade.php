<x-mail::message>
# Hello {{ $name }}

Your OTP is : {{ $otp }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>