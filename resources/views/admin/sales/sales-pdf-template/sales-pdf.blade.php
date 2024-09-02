<html>

<head>
    <title>Customers with Tender</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <div class="sales-card">
            @include('partials.letter-head')
            <h3 class="receipt-title">SALE DETAIL</h3>
            
            <table class="receipt-table" style="margin-bottom: 200px;">
                {{-- Table Heading --}}
                <tr>
                    <th width="16%">Order Id</th>
                    <th width="16%">Price</th>
                    <th width="16%">Customer Name</th>
                    <th width="48%">Customer Address</th>
                </tr>

                {{-- Table Data --}}
                @foreach($sales as $key => $sale)
                    <tr>
                        {{-- <td>{{ $key+1 }} </td> --}}
                        <td>{{ $sale->OrderID }} </td>
                        <td>${{ $sale->TotalAmount }}</td>
                        <td>{{ $sale->CustomerName }}</td>
                        <td>{{ $sale->ShippingAddress }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
