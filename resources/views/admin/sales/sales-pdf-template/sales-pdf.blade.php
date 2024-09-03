<html>

<head>
    <title>Sales PDF</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <style>
        body{
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div class="main-card">
        <div class="sales-card">
            @include('partials.letter-head')
            <h3 class="receipt-title">SALE DETAIL</h3>
            
            <table class="receipt-table" style="margin-bottom: 200px;">
                {{-- Table Heading --}}
                <tr>
                    <th>Order Id</th>
                    <th>Price</th>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
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
