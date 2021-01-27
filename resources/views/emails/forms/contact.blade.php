@component('mail::message')
Hallo!

Über das Kontakt-Formular der Website [{{ config('app.url') }}]({{ config('app.url') }}) wurde eine neue Anfrage übermittelt.

@component('mail::panel')
**Name:** {{ $data['name'] }}

**E-Mail:** {{ $data['email'] }}

**Nachricht:** {{ $data['message'] }}
@endcomponent

Viele Grüße,<br>
{{ config('app.name') }} Bot
@endcomponent
