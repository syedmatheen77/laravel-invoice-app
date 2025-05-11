<?php
namespace App\Http\Controllers;

use App\Events\InvoiceCreated;
use App\Models\Invoice;
use App\Services\InvoiceCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/invoice')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function store(Request $request, InvoiceCalculationService $calculate)
    {
        $validated = $request->validate([
            'client_name'      => 'required|string',
            'client_email'     => 'required|email',
            'item_description' => 'required|string',
            'quantity'         => 'required|integer|min:1',
            'price_per_item'   => 'required|numeric|min:0',
            'tax_percentage'   => 'required|numeric|min:0',
        ]);

        $calculated = $calculate->calculate(
            $validated['quantity'],
            $validated['price_per_item'],
            $validated['tax_percentage']
        );
        // echo"<pre>";print_r($calculated);exit;

        // $invoice = Invoice::create(array_merge($validated, [
        //     'subtotal' => $calculated['subtotal'],
        //     'tax_amount' => $calculated['tax'],
        //     'total' => $calculated['total'],
        // ]));

        $invoice = Invoice::create([
            'client_name'      => $request->client_name,
            'client_email'     => $request->client_email,
            'item_description' => $request->item_description,
            'quantity'         => $validated['quantity'],
            'price_per_item'   => $validated['price_per_item'],
            'tax_percentage'   => $validated['tax_percentage'],
            'subtotal'         => $calculated['subtotal'],
            'tax_amount'       => $calculated['tax'],
            'total'            => $calculated['total'],
        ]);
        event(new InvoiceCreated($invoice->id));

        // event(new ClientInvoice($invoice->id));
        return back()->with('success', 'Invoice created!');

        // event(new InvoiceCreated($invoice));

        // return redirect()->back()->with('success', 'Invoice submitted and email queued.');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
