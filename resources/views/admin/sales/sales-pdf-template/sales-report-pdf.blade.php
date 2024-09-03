<!DOCTYPE html>
<html>
<head>
    <title>Customers with Tender</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <style>
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .receipt-table th, .receipt-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .receipt-table th {
            background-color: #f4f4f4;
        }
        .receipt-title {
            text-align: center;
            margin: 20px 0;
        }
        .main-card {
            padding: 20px;
        }
        .nested-table {
            margin-top: 20px;
        }
        .receipt-table {
            font-weight: 200;
        }
    </style>
</head>
<body>
    <div class="main-card">
        <div class="sales-card">
            @include('partials.letter-head')
            <h3 class="receipt-title">SALE DETAIL</h3>
            
            <!-- Main Sales Table -->
            <table class="receipt-table">
                <thead>
                    <tr>
                        <th width="20%">Order Id</th>
                        <th width="20%">Store</th>
                        <th width="20%">Quantity</th>
                        <th width="40%">Total Amt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale['OrderID'] }}</td>
                            <td>{{ $sale['store_name'] ?? 'N/A' }}</td>
                            <td>{{ $sale['productTotalQuantity'] }}</td>
                            <td>${{ number_format($sale['productTotalAmount'], 2) }}</td>
                        </tr>
                        @if (isset($sale['product_details']) && is_array($sale['product_details']))
                            <!-- Nested Products Table -->
                            <tr>
                                <td colspan="4">
                                    <table class="receipt-table nested-table">
                                        <thead>
                                            <tr>
                                                <th width="40%">Item Name</th>
                                                <th width="20%">Qty</th>
                                                <th width="40%">Total Amt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sale['product_details'] as $product)
                                                <tr>
                                                    <td>{{ $product['name'] }}</td>
                                                    <td>{{ $product['quantity'] }}</td>
                                                    <td>${{ number_format($product['product_total_amount'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- Display Discount, Tax, and Total -->
                            <tr>
                                <td colspan="4" style="text-align: right; padding: 10px;">
                                    <div style="line-height: 1.5;">
                                        <strong>Discount Amount:</strong> ${{ number_format($sale['DiscountAmount'], 2) }}<br>
                                        <strong>Tax Amount:</strong> ${{ number_format($sale['TaxAmount'], 2) }}<br>
                                        <strong>Gross Total:</strong> ${{ number_format($sale['TotalAmount'], 2) }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
