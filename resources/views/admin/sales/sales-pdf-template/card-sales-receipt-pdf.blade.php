<html>

<head>
    <title> Customer with Tender type Card</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <h3> Customer with Tender type Card</h3>
        <div class="sales-card">
            <h5 class="main-title">SAMPLE MANUFACTURING LIMITED</h5>
            <h3 class="receipt-title">SALE RECEIPT</h3>
            <p class="main-content">TRN</p>
            <div class="content-details">
                <p class="main-content">Sales Receipt No. {{ $invoice_id }} </p>
                <p class="main-content">Date of Sale {{ date('d-m-Y') }}</p>
            </div>
            <p class="receipt-time">Time: {{ date('H:i:s') }}</p>
            <table class="receipt-table">
                {{-- Table Heading --}}
                <tr>
                    <th width="48%">Description</th>
                    <th width="16%">Qty</th>
                    <th width="16%">Rate Per Unit</th>
                    <th width="16%">Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                @foreach($cart['products'] as $key => $products)
                    <tr>
                        <td>{{ $key+1 }}. {{ $products['name'] }} </td>
                        <td>{{ $products['quantity'] }} </td>
                        <td>{{ $products['price'] }}</td>
                        <td>{{ $products['product_total_amount'] }}</td>
                    </tr>
                @endforeach
                @if(isset($discountDetails) && !empty($discountDetails))
                <tr>
                    <td>{{ $discountDetails['name'] }}</td>
                    <td></td>
                    <td></td>
                    <td>({{ $discountDetails['discount_amount'] }})</td>
                </tr>
                @endif
                <tr>
                    <td rowspan="7"></td>
                    <td colspan="2" class="g-total">Gross Sale Amount</td>
                    <td>{{ $cart['formatted_sub_total'] }}</td>
                </tr>
                @if(isset($discountDetails) && !empty($discountDetails))
                    <tr>
                        <td colspan="2">Total Discount</td>
                        <td>({{ $discountDetails['discount_amount'] }})</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">Total Discount</td>
                        <td>(0)</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="2">Net Sales Amount</td>
                    <td>{{ $cart['formatted_grand_total'] }}</td>
                </tr>
                <tr>
                    <td colspan="2">GCT @15%</td>
                    <td>{{ $cart['tax'] }}</td>
                </tr>
                <tr>
                    <td colspan="2">Total Payable</td>
                    <td>{{ $cart['payable'] }} </td>
                </tr>
                <tr>
                    <td colspan="2">Tendered Amount</td>
                    <td>{{ $cart['payable'] }}</td>
                </tr>
                <tr>
                    <td colspan="2">Change</td>
                    <td></td>
                </tr>
                <tr class="empty-row">
                    <td></td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Customer Name: Cash</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Customer Contact: 876-9800</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tender type: Card</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Card ending:</td>
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
