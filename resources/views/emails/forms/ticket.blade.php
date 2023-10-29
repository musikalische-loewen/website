@component('mail::message')
Hallo {{ $ticket->data['name'] }},

Vielen Dank für Ihre Kartenbestellung #{{ $ticket->number }} auf der Website [{{ config('app.url') }}]({{ config('app.url') }}).

Wir haben die folgenden Karten für das Adventskonzert am 3. Dezember 2023 für Sie reserviert:

@component('mail::panel')
Erwachsene/Jugendliche (10€): {{ $ticket->data['number_full'] }}

Kinder (0€, bis 14 Jahre): {{ $ticket->data['number_free'] }}
@endcomponent

Das Konzert findet in der Pfarrkirche St. Laurentius Nentershausen statt und beginnt um 15:00.

Die Karten können am Kircheneingang gegen Vorlage dieser Mail abgeholt werden. Es ist jedoch nicht notwendig diese Mail auszudrucken, das Vorzeigen auf einem Smartphone o.ä. ist ausreichend.

Wir freuen uns auf Ihren Besuch!

Mit freundlichen Grüßen,<br>
{{ config('app.name') }}
@endcomponent
