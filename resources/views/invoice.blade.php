<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Create Invoice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Create Invoice</h4>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-light btn-sm">Logout</button>
                            </form>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('invoices.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="client_name"
                                        class="form-control @error('client_name') is-invalid @enderror"
                                        value="{{ old('client_name') }}" required>
                                    @error('client_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Client Email</label>
                                    <input type="email" name="client_email"
                                        class="form-control @error('client_email') is-invalid @enderror"
                                        value="{{ old('client_email') }}" required>
                                    @error('client_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Item Description</label>
                                    <textarea name="item_description" class="form-control @error('item_description') is-invalid @enderror" rows="3"
                                        required>{{ old('item_description') }}</textarea>
                                    @error('item_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            value="{{ old('quantity') }}" required>
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Price Per Item</label>
                                        <input type="number" name="price_per_item" step="0.01"
                                            class="form-control @error('price_per_item') is-invalid @enderror"
                                            value="{{ old('price_per_item') }}" required>
                                        @error('price_per_item')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tax Percentage</label>
                                        <input type="number" name="tax_percentage" step="0.01"
                                            class="form-control @error('tax_percentage') is-invalid @enderror"
                                            value="{{ old('tax_percentage') }}" required>
                                        @error('tax_percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">Submit Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
