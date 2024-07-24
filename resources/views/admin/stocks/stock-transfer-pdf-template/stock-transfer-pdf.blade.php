<html>

<head>
    <title> Stock Transfer </title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <h3>Stock Transfer</h3>
        <div class="sales-card">
            <h5 class="main-title">SAMPLE MANUFACTURING LIMITED</h5>
            <h3 class="receipt-title">STOCK TRANSFER</h3>
            <p class="main-content">Document No: {{ $return_invoice_id }}</p>
            <p class="main-content">Document Posted Date & Time : {{ date('d-m-Y H:i:s') }}</p>
            <div class="content-details">
                <p class="main-content">From Location: {{ $from_location }}</p>
                <p class="main-content">To Location: {{ $to_location }}</p>
            </div>
            <table class="receipt-table">
                {{-- Table Heading --}}
                <tr>
                    <th width="48%">Description</th>
                    <th width="16%">Qty</th>
                    <th width="16%">Rate Per Unit</th>
                    <th width="16%">Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                @foreach($returnStocks as $key=> $returnStock)
                    <tr>
                        <td>{{ $key+1 }}. {{ $returnStock->name }}</td>
                        <td>{{ $returnStock->quantity }}</td>
                        <td>{{ $returnStock->price }}</td>
                        <td>{{ $returnStock->price * $returnStock->quantity}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Total Quantity</td>
                    <td>{{ $totalProduct }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
                
            <table class="receipt-table">
                {{-- Table Heading 2--}}
                <tr>
                    <th width="16%"></th>
                    <th width="16%">Signature</th>
                    <th width="16%">Date</th>
                    <th width="24%">Receiver Stamp</th>
                    <th width="24%">Sending Location Security</th>
                </tr>
                {{-- Table data 2--}}
                <tr>
                    <td>Picked by:</td>
                    <td></td>
                    <td></td>
                    <td rowspan="4"></td>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <td>Loaded by:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Vehicle No:</td>
                    <td colspan="2">{{ $vehicle_number }}</td>
                </tr>
                <tr>
                    <td>Driver Name:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Received by:</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: start;">Received Time:</td>
                    <td style="text-align: start;">Dispatch Time:</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
