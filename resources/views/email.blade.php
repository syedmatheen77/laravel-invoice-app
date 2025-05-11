<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }
        .invoice-box {
            background-color: #ffffff;
            max-width: 700px;
            margin: auto;
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0,0,0,0.07);
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .total-row {
            background-color: #e9f7ef;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <h3 class="text-primary mb-4">Hello {{ $invoice->client_name }},</h3>
    <p>Thank you for your business! Below are the details of your invoice:</p>

    <table class="table table-bordered mt-4">
        <tbody>
            <tr>
                <th scope="row">Item Description</th>
                <td>{{ $invoice->item_description }}</td>
            </tr>
            <tr>
                <th scope="row">Quantity</th>
                <td>{{ $invoice->quantity }}</td>
            </tr>
            <tr>
                <th scope="row">Price per Item</th>
                <td>${{ number_format($invoice->price_per_item, 2) }}</td>
            </tr>
            <tr>
                <th scope="row">Tax Percentage</th>
                <td>{{ $invoice->tax_percentage }}%</td>
            </tr>
            <tr>
                <th scope="row">Subtotal</th>
                <td>${{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            <tr>
                <th scope="row">Tax Amount</th>
                <td>${{ number_format($invoice->tax_amount, 2) }}</td>
            </tr>
            <tr class="total-row">
                <th scope="row">Total</th>
                <td>${{ number_format($invoice->total, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
