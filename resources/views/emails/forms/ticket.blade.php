@component('mail::message')
Hallo {{ $ticket->data['name'] }},

Vielen Dank für Ihre Kartenbestellung #{{ $ticket->number }} auf der Website [{{ config('app.url') }}]({{ config('app.url') }}).

Wir haben die folgenden Karten für das Pfingstkonzert am 28. Mai 2023 für Sie reserviert:

@component('mail::panel')
Erwachsene (11€): {{ $ticket->data['number_full'] }}

Jugendliche (6€, 15 bis 17 Jahre): {{ $ticket->data['number_reduced'] }}

Kinder (0€, bis 14 Jahre): {{ $ticket->data['number_free'] }}
@endcomponent

Die Karten können an der Abendkasse gegen Vorlage dieser Mail abgeholt werden. Es ist jedoch nicht notwendig diese Mail auszudrucken, das Vorzeigen auf einem Smartphone o.ä. ist ausreichend.

{{-- Im Anhang dieser Mail finden Sie noch eine Postkarte mit weiteren Informationen zum Konzert. --}}

Wir freuen uns auf Ihren Besuch!

Mit freundlichen Grüßen,<br>
{{ config('app.name') }}
@endcomponent
