@component('mail::message')
Hallo {{ $ticket->data['name'] }},

Vielen Dank für Ihre Kartenbestellung #{{ $ticket->number }} auf der Website [{{ config('app.url') }}]({{ config('app.url') }}).

Wir haben die folgenden Karten für das Pfingstkonzert am 19. Mai 2024 für Sie reserviert:

@component('mail::panel')
Erwachsene (11€, ab 18. Lebensjahr): {{ $ticket->data['number_full'] }}

Jugendliche (6€, 15. bis 17. Lebensjahr): {{ $ticket->data['number_reduced'] }}

Kinder (0€, bis 14. Lebensjahr): {{ $ticket->data['number_free'] }}
@endcomponent

Das Konzert findet in der Freiherr-vom-Stein-Halle Nentershausen statt und beginnt um 17:00.

Die Karten können an der Abendkasse gegen Vorlage dieser Mail abgeholt werden. Es ist jedoch nicht notwendig diese Mail auszudrucken, das Vorzeigen auf einem Smartphone o.ä. ist ausreichend.

Wir freuen uns auf Ihren Besuch!

Mit freundlichen Grüßen,<br>
{{ config('app.name') }}
@endcomponent
