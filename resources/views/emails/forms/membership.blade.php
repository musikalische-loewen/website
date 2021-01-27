@component('mail::message')
Hallo!

Eine neue Anfrage wurde über das Mitgliedschaftsformular auf der Website [{{ config('app.url') }}]({{ config('app.url') }}) initiiert.

@component('mail::panel')
**Mitgliedschaftstyp:** {{ $data['type'] }}

**Mitgliedschaftsbegin:** {{ $data['start'] }}

**Vorname:** {{ $data['first_name'] }}

**Nachname:** {{ $data['last_name'] }}

**Straße:** {{ $data['street'] }}

**PLZ:** {{ $data['zip'] }}

**Ort:** {{ $data['city'] }}

**E-Mail:** {{ $data['email'] }}

**Telefonnummer:** {{ $data['phone'] }}

**Instrument:** {{ $data['instrument'] ?? '' }}

**Geburtstag:** {{ $data['birthday'] }}

**Hochzeitstag:** {{ $data['anniversary'] ?? '' }}

**IBAN:** {{ $data['iban'] }}

**BIC:** {{ $data['bic'] }}

**Kontoinhaber:** {{ $data['bank_account_owner'] }}
@endcomponent

Viele Grüße,<br>
{{ config('app.name') }} Bot
@endcomponent
