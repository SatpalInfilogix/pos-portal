@foreach ($products as $product)
    @php
        $cartProducts = session('cart.products', []); // Retrieve the 'products' array from session or default to an empty array
        $cartProductIds = [];
        foreach ($cartProducts as $cart_product) {
            $cartProductIds[] = $cart_product['id']; // Push each product ID into the $productIds array
        }
    @endphp

    <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
        <div id="product-check_{{ $product->id }}" @class([
            'product-info default-cover card',
            'products-' . $product->id,
            'added-to-cart' => in_array($product->id, $cartProductIds),
            'disabled' => $product->quantity == 0,
        ])
            onclick="addToCartAndToggleTick('{{ $product->id }}')">
            <div class="img-bg">
                <img class="img-bg" id="productImage{{ $product->id }}"
                    src="{{ asset($product->image) }}" alt="Product Image">

                @if ($product->quantity == 0)
                    <div class="out-of-stock">Out Of Stock</div>
                @endif
            </div>
            <h6 class="cat-name"><a
                    href="javascript:void(0);">{{ $product->categoryName }}</a></h6>
            <h6 class="product-name"><a
                    href="javascript:void(0);">{{ $product->name }}</a>
            </h6>
            <div class="d-flex align-items-center justify-content-between price">
                <span><span id="up-quantity">{{ $product->quantity }}</span> Pcs</span>
                <p>${{ number_format(optional($product)->price, 2) }}</p>
            </div>
            <div class="input-group mt-2">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" id="quantity{{ $product->id }}"
                    class="form-control" value="1" min="1">
            </div>
        </div>
    </div>
@endforeach