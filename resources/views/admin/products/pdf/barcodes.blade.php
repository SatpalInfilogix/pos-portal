<!DOCTYPE html>
<html>
<head>
    <title>Product Barcodes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .barcode-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            gap: 20px; /* Space between items */
        }
        .barcode {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .barcode:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .barcode img {
            max-width: 80%;
            height: auto;
            margin: 10px 0;
        }
        .barcode p {
            margin: 5px 0;
        }
        .barcode .product-name {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }
        .barcode .product-code {
            font-size: 1em;
            color: #666;
        }

        /* Responsive design for small screens */
        @media (max-width: 1024px) {
            .barcode-row {
                grid-template-columns: repeat(2, 1fr); /* Two columns for tablets */
            }
        }

        @media (max-width: 768px) {
            .barcode-row {
                grid-template-columns: 1fr; /* One column for phones */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Barcodes</h1>
        <div class="barcode-row">
            @foreach($barcodes as $item)
            <div class="barcode">
                <p class="product-name">{{ $item['product']->name }}</p>
                <img src="data:image/png;base64,{{ $item['barcode'] }}" alt="Barcode">
                <p class="product-code">{{ $item['product']->product_code }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
