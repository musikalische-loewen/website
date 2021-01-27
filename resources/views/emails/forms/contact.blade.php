@component('mail::message')
Hallo!

Eine neue Anfrage wurde über das Kontaktformular auf der Website [{{ config('app.url') }}]({{ config('app.url') }}) initiiert.

@component('mail::panel')
**Name:** {{ $data['name'] }}

**E-Mail:** {{ $data['email'] }}

**Nachricht:** {{ $data['message'] }}
@endcomponent

Viele Grüße,<br>
{{ config('app.name') }} Bot
@endcomponent
