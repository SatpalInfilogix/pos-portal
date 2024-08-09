<html>

<head>
    <title>Customers with Tender</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <div class="sales-card">
            <h5 class="main-title">SAMPLE MANUFACTURING LIMITED</h5>
            <h3 class="receipt-title">SALE RECEIPT</h3>
            <p class="main-content">TRN</p>
            <div class="content-details">
                <p class="main-content">Sales Receipt No. {{ $orderDetail->OrderID }} </p>
                <p class="main-content">Date of Sale {{ \Carbon\Carbon::parse($orderDetail->created_at)->format('d-m-Y') }}</p>
            </div>
            <p class="receipt-time">Time: {{ \Carbon\Carbon::parse($orderDetail->created_at)->format('h:i:s A') }}</p>
            <table class="receipt-table">
                {{-- Table Heading --}}
                <tr>
                    <th width="48%">Description</th>
                    <th width="16%">Qty</th>
                    <th width="16%">Rate Per Unit</th>
                    <th width="16%">Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                @php
                $grossTotal = 0;    
                @endphp
                @foreach($orderDetail->productDetails as $key => $products)
                    <tr>
                        <td>{{ $key+1 }}. {{ $products->name }} </td>
                        <td>{{ $products->quantity }} </td>
                        <td>${{ $products->price }}</td>
                        <td>${{ $products->product_total_amount }}</td>
                    </tr>
                    @php
                    $grossTotal += $products->product_total_amount;    
                    @endphp
                @endforeach
                <tr>
                    <td rowspan="7"></td>
                    <td colspan="2" class="g-total">Gross Sale Amount</td>
                    <td>${{ $grossTotal }}</td>
                </tr>

                <tr>
                    <td colspan="2">Total Discount</td>
                    <td>(${{ $orderDetail->DiscountAmount ?? '0'}})</td>
                </tr>
                <tr>
                    <td colspan="2">GCT @15%</td>
                    <td>${{ $orderDetail->TaxAmount }}</td>
                </tr>
                <tr>
                    <td colspan="2">Total Payable</td>
                    <td>${{ $orderDetail->TotalAmount }} </td>
                </tr>
                <tr>
                    <td colspan="2">Tendered Amount</td>
                    <td>${{ $orderDetail->tender_amount ?? '0' }}</td>
                </tr>
                <tr>
                    <td colspan="2">Change</td>
                    <td>${{ $orderDetail->change_amount ?? '0'}}</td>
                </tr>
                <tr class="empty-row">
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>Customer Name: {{ $orderDetail->customerDetail->customer_name }}</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Customer Contact: {{ $orderDetail->customerDetail->contact_number }}</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tender type: {{ $orderDetail->PaymentMethod }}</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>

                <tr class="single-data">
                    <td colspan="4">Terms and Conditions:</td>
                </tr>
                <tr class="single-data">
                    <td colspan="4">1.</td>
                </tr>
                <tr class="single-data">
                    <td colspan="4">2.</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
