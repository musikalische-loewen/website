<?php

namespace App\Jobs;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TicketOverview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $event;

    /**
     * Create a new job instance.
     */
    public function __construct(string $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tickets = Ticket::where('event', $this->event)->whereNotNull('paid_at')->get()->map(
            function (Ticket $ticket, int $key) {
                return [
                    $ticket->number,
                    $ticket->data['name'],
                    $ticket->email,
                    $ticket->data['number_full'],
                    $ticket->data['number_reduced']
                ];
            }
        )->toArray();
        $spreadsheet = new Spreadsheet();
        $active = $spreadsheet->getActiveSheet();
        $active->setCellValue('A1', 'Ticketvorverkauf (online)');
        $active->getStyle('A1')->getFont()->setBold(true);
        $active->setCellValue('A2', sprintf('Veranstaltung: %s', $this->event));
        $active->setCellValue('A3', sprintf('Stand: %s', date('Y-m-d H:i')));
        $active->setCellValue('A5', 'Nummer');
        $active->setCellValue('B5', 'Name');
        $active->setCellValue('C5', 'E-Mail');
        # TODO: Automaticaly determine/show all price categories
        $active->setCellValue('D5', 'Normalpreis');
        $active->setCellValue('E5', 'Kostenlos');
        $active->getStyle('5:5')->getFont()->setBold(true);
        $active->fromArray($tickets, null, 'A6');
        foreach ($active->getColumnIterator() as $column) {
            $active->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('logs/tickets.xlsx'));
    }
}
