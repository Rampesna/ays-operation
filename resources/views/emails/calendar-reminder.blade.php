@component('mail::message')
# Merhabalar Sayın, {{ auth()->user()->getName() }}

{{ $calendarReminder->title }}

<p>
    {!! $calendarReminder->note !!}
</p>

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
