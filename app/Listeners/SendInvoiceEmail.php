<?php
namespace App\Listeners;

use App\Events\InvoiceCreated;
use App\Mail\InvoiceReportMail;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoiceEmail implements ShouldQueue
{
    public function handle(InvoiceCreated $event)
    {

        $invoice = Invoice::find($event->invoiceId);

        if (! $invoice) {
            return;
        }
        Mail::to($invoice->client_email)->send(new InvoiceReportMail($invoice));
    }
}
