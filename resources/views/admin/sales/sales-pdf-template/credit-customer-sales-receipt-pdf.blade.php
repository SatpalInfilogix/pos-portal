<html>

<head>
    <title> Credit Customer</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>

<body>
    <div class="main-card">
        <h3> Credit Customer</h3>
        <div class="sales-card">
            <h5 class="main-title">SAMPLE MANUFACTURING LIMITED</h5>
            <h3 class="receipt-title">SALE RECEIPT</h3>
            <p class="main-content">TRN</p>
            <div class="content-details">
                <p class="main-content">Sales Receipt No. XXXXXXXXXXXXXX </p>
                <p class="main-content">Date of Sale DD/MMM/YYYY</p>
            </div>
            <p class="receipt-time">Time: HH:MM:SS</p>
            <table class="receipt-table">
                {{-- Table Heading --}}
                <tr>
                    <th width="48%">Description</th>
                    <th width="16%">Qty</th>
                    <th width="16%">Rate Per Unit</th>
                    <th width="16%">Amount (JMD)</th>
                </tr>
                {{-- Table Data --}}
                <tr>
                    <td>1. Vanilla Bucket 5 Ltr </td>
                    <td>3</td>
                    <td>10,000</td>
                    <td>20,000</td>
                </tr>
                <tr>
                    <td>Discount Multibuy 3-5%</td>
                    <td></td>
                    <td></td>
                    <td>(1,000)</td>
                </tr>
                <tr>
                    <td>2. Chocolate Cone 8 Pk</td>
                    <td>10</td>
                    <td>2,000</td>
                    <td>20,000</td>
                </tr>
                <tr>
                    <td>Buy 10 get 5%</td>
                    <td></td>
                    <td></td>
                    <td>(1,000) </td>
                </tr>

                <tr>
                    <td rowspan="7"></td>
                    <td colspan="2" class="g-total">Gross Sale Amount</td>
                    <td>40,000</td>
                </tr>
                <tr>
                    <td colspan="2">Total Discount</td>
                    <td>(2,000)</td>
                </tr>
                <tr>
                    <td colspan="2">Net Sales Amount</td>
                    <td>38,000</td>
                </tr>
                <tr>
                    <td colspan="2">GCT @15%</td>
                    <td>5700</td>
                </tr>
                <tr>
                    <td colspan="2">Total Payable</td>
                    <td>43,700</td>
                </tr>
                <tr>
                    <td colspan="2">Tendered Amount</td>
                    <td>44,000</td>
                </tr>
                <tr>
                    <td colspan="2">Change</td>
                    <td>300</td>
                </tr>
                <tr class="empty-row">
                    <td></td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fix-width">Bill to</td>
                    <td colspan="3" class="g-total">Ship to</td>
                </tr>
                <tr>
                    <td>
                        Customer Number:
                        <br/>
                        <br/>
                        Customer Name:
                        <br/>
                        <br/>
                        Address:
                        <br/>
                        <br/>
                        Email:
                        <br/>
                        <br/>
                        Phone:
                    </td>
                    <td colspan="3" class="ship-address">
                        Customer Number:
                        <br/>
                        <br/>
                        Customer Name:
                        <br/>
                        <br/>
                        Address:
                        <br/>
                        <br/>
                        Email:
                        <br/>
                        <br/>
                        Phone:
                    </td>
                </tr>
                <tr>
                    <td>Tender type: Gift Card</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Validity: DD/MMM/YYYY</td>
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
