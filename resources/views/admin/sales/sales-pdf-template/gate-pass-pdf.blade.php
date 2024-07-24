<html>

<head>
    <title> Gate Pass</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <h3>Gate Pass</h3>
        <div class="sales-card">
            <h5 class="main-title">SAMPLE MANUFACTURING LIMITED</h5>
            <h3 class="receipt-title">GATE PASS</h3>
            <table class="head-table">
                <tr>
                    <td class="left">TRN</td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left">Sales Receipt No. {{ $invoice_id }}</td>
                    <td class="right" style="float: inline-end;">Date of Sale {{ date('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="right" style="float: inline-end;">Time: {{ date('H:i:s') }}</td>
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
                    <th width="48%">Description</th>
                    <th width="16%">Qty</th>
                    <th width="16%">Rate Per Unit</th>
                    <th width="16%">Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                @foreach($productDetails as $key => $productDetail)
                <tr>
                    <td>{{ $key+1 }}. {{ $productDetail->name }}</td>
                    <td>{{ $productDetail->quantity }}</td>
                    <td></td>
                    <td>{{ $productDetail->product_total_amount }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Total Quantity</td>
                    <td>{{ $totalQuantity }}</td>
                    <td></td>
                    <td></td>
                </tr>
                
            </table>
        </div>
    </div>
</body>

</html>
