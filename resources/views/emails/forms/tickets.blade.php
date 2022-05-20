@component('mail::message')
Hallo {{ $data['name'] }},

Vielen Dank für Ihre Kartenbestellung auf der Website [{{ config('app.url') }}]({{ config('app.url') }}).

Wir haben die folgende Karten für das Pfingstkonzert am 5. Juni 2022 für Sie reserviert:

@component('mail::panel')
Erwachsene (9€): {{ $data['number_full'] }}

Jugendliche (5€, 15 bis 17 Jahre): {{ $data['number_reduced'] }}

Kinder (0€, bis 14 Jahre): {{ $data['number_free'] }}
@endcomponent

Bitte überweisen Sie den Eintrittspreis von insgesamt **{{ round($data['number_full']*9+$data['number_reduced']*5) }}€** bis zum 2. Juni 2022 auf das Konto des **{{ config('app.name_full') }}** mit der IBAN **DE21 5105 0015 0803 2892 89** und der BIC **NASSDE55XXX**. Geben Sie als Verwendungszweck bitte **Karten Pfingskonzert 2022, {{ $data['name'] }}** an.

Alternativ können Sie sich auch mit Achim Gläser (E-Mail: <a class="text-dark" href="mailto:vorsitzender2@musikalische-loewen.de">vorsitzender2@musikalische-loewen.de</a>, Telefon: <a class="text-dark" href="tel:+496485911543" >06485 911543</a>) in Verbindung setzen.

Die Karten werden nach erfolgreicher Bezahlung an der Kasse für Sie hinterlegt.

Im Anhang dieser Mail finden Sie noch einen Flyer mit weiteren Informationen zum Konzert.

Wir freuen uns auf Ihren Besuch!

Mit freundlichen Grüßen,<br>
{{ config('app.name') }}
@endcomponent
