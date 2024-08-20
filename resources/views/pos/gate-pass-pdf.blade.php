<html>

<head>
    <title> Gate Pass</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <div class="sales-card">
            @include('partials.letter-head')
            <h3 class="receipt-title">GATE PASS</h3>
            <table class="head-table">
                <tr>
                    <td class="left">TRN</td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left">Sales Receipt No. {{ $gatePass->id}}</td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left">Store : {{ $gatePass->store->name }}</td>
                    <td class="right" style="float: inline-end;">Date of Sale {{ \Carbon\Carbon::parse($gatePass->created_at)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="left">Vehicle No. {{ $gatePass->VehicleNumber}}</td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="right" style="float: inline-end;">Time: {{ \Carbon\Carbon::parse($gatePass->created_at)->format('h:i:s A') }}</td>
                </tr>
            </table>
             {{-- <p class="main-content">TRN</p>
            <div class="content-details">
                <p class="main-content">Sales Receipt No. {{ $gatePass->id }} </p>
                <p class="main-content">Date of Sale {{ date('d-m-Y') }}</p>
            </div>
            <p class="receipt-time">Time: {{ date('H:i:s') }}</p> --}}
            <table class="receipt-table" style="margin-bottom: 200px;">
                {{-- Table Heading --}}
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Checked</th>
                    <th>Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                @php
                    $totalProducts = 0;    
                @endphp
                @foreach ($gatePass->productDetails as $key => $delivered_item)
                @php
                    $totalProducts += $delivered_item->quantity;    
                @endphp
                <tr>
                    <td>{{ ++$key.". ".$delivered_item->name }}</td>
                    <td>{{ $delivered_item->quantity }}</td>
                    <td></td>
                    <td>{{ $delivered_item->price * $delivered_item->quantity}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Total Quantity</td>
                    <td>{{ $totalProducts }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
