<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected function getLineItem(string $name, int $price, int $quantity): array
    {
        return [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $price,
                    'product_data' => [
                        'name' => $name,
                    ],
                ],
                'quantity' =>  $quantity,
        ];
    }

    /**
     * Store a newly created resource in storage and initialize the payment.
     */
    public function store(TicketRequest $request): RedirectResponse
    {
        $line_items = [];
        if ($request->number_full) {
            $line_items[] = self::getLineItem(
                'Ticket Pfingstkonzert 2024 (regulär, ab 18. Lebensjahr)',
                1100,
                $request->number_full
            );
        }
        if ($request->number_reduced) {
            $line_items[] = self::getLineItem(
                'Ticket Pfingstkonzert 2024 (ermäßigt, 15. bis 17. Lebensjahr)',
                600,
                $request->number_reduced
            );
        }
        if ($request->number_free) {
            $line_items[] = self::getLineItem(
                'Ticket Pfingstkonzert 2024 (kostenlos, bis 14. Lebensjahr)',
                0,
                $request->number_free
            );
        }
        $checkout_session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'customer_email' => $request->email,
            'success_url' => route('forms.ticket.success'),
            'cancel_url' => route('forms.ticket.cancel'),
            'locale' => 'de'
        ]);
        Ticket::create([
            'event' => 'pfingstkonzert_2024',
            'email' => $request->email,
            'data' => [
                'name' => $request->name,
                'number_full' => $request->number_full,
                'number_reduced' => $request->number_reduced,
                'number_free' => $request->number_free
            ],
            'stripe_checkout_session_id' => $checkout_session->id
        ]);
        return redirect($checkout_session->url);
    }

    public function storeError(): RedirectResponse
    {
        return redirect()->route('forms.ticket')->withErrors([
            'error' => 'Der Bezahlvorgang wurde abgebrochen. Versuchen Sie es doch noch einmal.
            Bei Fragen können Sie uns über das Kontaktformular erreichen.']);
    }

    public function storeSuccess(): RedirectResponse
    {
        return redirect()->route('forms.ticket')->with('success', 'Vielen Dank für Ihre Bestellung.
        Sobald Ihre Zahlung verbucht wurde, erhalten Sie eine Bestätigungsmail.
        Bei Fragen können Sie uns über das Kontaktformular erreichen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
