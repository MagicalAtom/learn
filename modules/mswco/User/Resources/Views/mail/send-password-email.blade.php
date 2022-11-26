<x-mail::message>
کد تغیر رمز عبور شما

اگر چنانچه این درخواست از سمت شما نبوده آن را نادیده بگیرید .
<x-mail::panel>
Code : {{ $code }}
</x-mail::panel>

با تشکر<br>
{{ config('app.name') }}
</x-mail::message>
