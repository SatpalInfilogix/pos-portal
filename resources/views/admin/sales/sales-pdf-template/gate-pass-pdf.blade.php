<html>

<head>
    <title> Gate Pass</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <h3>Gate Pass</h3>
        <div class="sales-card">
            @include('partials.letter-head')
            <h3 class="receipt-title">GATE PASS</h3>
            <table class="head-table">
                <tr>
                    <td class="left">TRN</td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left">Store : {{ $transferedInventory->store->name }}</td>
                    <td class="right" style="float: inline-end;">Date of Sale {{ \Carbon\Carbon::parse($transferedInventory->created_at)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="right" style="float: inline-end;">Time: {{ \Carbon\Carbon::parse($transferedInventory->created_at)->format('h:i:s A') }}</td>
                </tr>
            </table>
            {{-- <p class="main-content">TRN</p>
            <div class="content-details">
                <p class="main-content">Sales Receipt No. {{ $invoice_id }} </p>
                <p class="main-content">Date of Sale {{ date('d-m-Y') }}</p>
            </div>
            <p class="receipt-time">Time: {{ date('H:i:s') }}</p> --}}
            <table class="receipt-table" style="margin-bottom: 200px;">
                {{-- Table Heading --}}
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Qty</th>
                </tr>
                {{-- Table Data --}}
                @foreach ($transferedInventory->deliveredItems as $key => $delivered_item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $delivered_item->product->name }}</td>
                    <td>{{ $delivered_item->quantity }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
