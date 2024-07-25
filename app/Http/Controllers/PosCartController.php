<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\Cart;
use App\Models\Discount;

class PosCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Retrieve product details
        $productDetail = Product::find($request->product_id);
        if (!$productDetail) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        // Determine product price (you can fetch this from your database)
        $productPrice = PriceMaster::where('product_id', $request->product_id)->first();
        $price = $productPrice ? $productPrice->price : 0;

        // Initialize or retrieve cart from session
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        $productExists = false;
        foreach ($cart['products'] ?? [] as $key => $product) {
            if ($product['id'] == $request->product_id) {
                if ($request->quantity == 0) {
                    unset($cart['products'][$key]); // Remove the product from cart if quantity is zero
                } else {
                    $cart['products'][$key]['quantity'] = $request->quantity;
                    $cart['products'][$key]['product_total_amount'] = $cart['products'][$key]['quantity'] * $product['price'];
                }
                $productExists = true;
                break;
            }
        }

        // If the product doesn't exist and quantity > 0, add it to the cart
        if (!$productExists && $request->quantity > 0) {
            $cart['products'][] = [
                "id" => $request->product_id,
                "quantity" => $request->quantity,
                "name" => $productDetail->name,
                "price" => $price,
                "product_total_amount" => $price * $request->quantity,
                "image" => $productDetail->image,
            ];
        }

        // Recalculate cart totals
        $cart_quantity = 0;
        $sub_total = 0;
        foreach ($cart['products'] as $product) {
            $cart_quantity += $product['quantity'];
            $sub_total += $product['quantity'] * $product['price'];
        }

        // Update cart totals
        $cart['quantity'] = $cart_quantity;
        $cart['sub_total'] = $sub_total;
        $cart['formatted_sub_total'] = '$' . number_format($sub_total, 2);
        $cart['count'] = count($cart['products']);

        $cart['discount'] = isset($cart['discount']) ? $cart['discount'] : [];
        $cart['discount_amount'] = isset($cart['discount_amount']) ? $cart['discount_amount'] : 0;
        
        if (!empty($cart['discount'])) {
            $sub_total -= $cart['discount_amount'];
            $cart['grand_total'] = $sub_total;
            $cart['formatted_grand_total'] = '$' . number_format($cart['grand_total'], 2);
            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = $cart['grand_total'] + $cart['tax'];
        } else {
            $cart['grand_total'] = $sub_total;
            $cart['formatted_grand_total'] = '$' . number_format($sub_total, 2);
            $cart['discount'] = 0; // Assuming discount should default to 0 if not set
            $cart['discount_amount'] = 0; // Assuming discount amount should default to 0 if not set
            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = $cart['grand_total'] + $cart['tax'];
        }

        // $applied_coupons = $cart['discount'] ?? [];
        // $cart['discount'] = $applied_coupons;
        // if($cart['discount']) {
        //     $sub_total -= $cart['discount_amount'];
        //     $cart['grand_total'] =  $sub_total;
        //     $cart['formatted_grand_total'] = '$'. Number_Format( $cart['grand_total'] , 2);
        //     $cart['discount'] = $cart['discount'];
        //     $cart['discount_amount'] = $cart['discount_amount'];
        // } else {
        //     $cart['grand_total'] = $sub_total;
        //     $cart['formatted_grand_total'] = '$'.(number_format($sub_total ,2));
        //     $cart['discount'] = 0;
        //     $cart['discount_amount'] = '$'. 0.00;
        // }

        // Store updated cart in session
        session()->put('cart', $cart);
        // Prepare data to return
        $responseData = [
            'success' => true,
            'message' => 'Cart updated successfully',
            'cart' => $cart, // Initialize an empty array to store product data
        ];

        // $cartData  =$this->generateCartData();
        // Return JSON response with success message and updated cart data
        // return response()->json(['success'=>true,'message'=>'Product Added to Cart','data'=> $cartData,'count'=> count($cart['products'])]);
        return response()->json(['success'=>true,'message'=>'Product Added to Cart', 'cart' => $cart, 'count'=> count($cart['products'])]);
    
    }

    // private function generateCartData(){
    //     $cartStr = '<div class="producr-list-cart">';
    //     if (session('cart') && isset(session('cart')['products']))
    //     {
    //         foreach(session('cart')['products'] as $key => $product)
    //         {
    //             $cartStr .= '<div class="product-list d-flex align-items-center justify-content-between">
    //                         <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
    //                             data-bs-target="#products">
    //                             <a href="javascript:void(0);" class="img-bg">
    //                                 <img src="'. $product['image'] .'"
    //                                     alt="Products">
    //                             </a>
    //                             <div class="info">
    //                                 <span>PT0005</span>
    //                                 <h6><a href="javascript:void(0);">'. $product['name'] .'</a></h6>
    //                                 <p>$'. $product['price'] .'</p>
    //                             </div>
    //                         </div>
    //                         <div class="qty-item text-center">
    //                             <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center decrease"data-bs-toggle="tooltip" data-id = "'. $product['id'] .'" data-bs-placement="top" title="minus">-</a>
    //                             <input type="text" class="form-control text-center quantity__number" name="qty" value="'. $product['quantity'] .'">
    //                             <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center increase" data-bs-toggle="tooltip" data-id = "'. $product['id'] .'" data-bs-placement="top" title="plus">+</a>
    //                         </div>
    //                         <div class="d-flex align-items-center action">
    //                             <!-- <a class="btn-icon edit-icon me-2" href="#"
    //                                 data-bs-toggle="modal" data-bs-target="#edit-product">
    //                                 <i data-feather="edit" class="feather-14"></i>
    //                             </a> -->
    //                             <a class="btn-icon delete-icon close-cart" onclick="removeFromCart('. $product['id'] .')">
    //                                 <i data-feather="trash-2" class="feather-14"></i>
    //                             </a>
    //                         </div>
    //                     </div>
    //                 </div>';
    //         }
    //     }
    //     return $cartStr;
    // }

    public function remove(Request $request)
    {
        if ($request->product_id) 
        {
            $cart = session()->get('cart');

            foreach ($cart['products'] ?? [] as $key => $product) {
                if ($product['id'] == $request->product_id) {
                    unset($cart['products'][$key]); // Unset the product from the cart
                    break; // Exit the loop once product is found and removed
                }
            }

            // Recalculate cart total quantity
            $cart_quantity = 0;
            foreach ($cart['products'] as $product) {
                $cart_quantity += $product['quantity'];
            }
            // Recalculate cart total amount
            $sub_total = 0;
            foreach ($cart['products'] as $product) {
                $sub_total += $product['price'] * $product['quantity']; // Corrected accessing price
            }
            
            // Update cart object
            $cart['quantity'] = $cart_quantity;
            $cart['sub_total'] = $sub_total;
            $cart['formatted_sub_total'] = '$' . number_format($sub_total, 2);
            

            $applied_coupons = $cart['discount'] ?? [];
            $cart['discount'] = $applied_coupons;
            $discounts = Discount::where('quantity', '<=', $cart_quantity)->get();
            if ($discounts->count() > 0) {
                if($cart['discount']) {
                    $sub_total -= $cart['discount_amount'];
                    $cart['grand_total'] =  $sub_total;
                    $cart['formatted_grand_total'] = '$'. Number_Format( $cart['grand_total'] , 2);
                    $cart['discount'] = $cart['discount'];
                    $cart['discount_amount'] = $cart['discount_amount'];
                }
            } else {
                $cart['grand_total'] = $sub_total;
                $cart['formatted_grand_total'] = '$'.(number_format($sub_total ,2));
                $cart['discount'] = 0;
                $cart['discount_amount'] = 0;
            }
          
            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = $cart['grand_total'] + $cart['tax'];
            $cart['count'] = count($cart['products']);
            
            session()->put('cart', $cart);

            // if (Auth::check()) {
                $user_id = 1;
                Cart::updateOrCreate(
                    ['user_id' => 1],
                    ['cart' => json_encode($cart)]
                );
            // }

            return response()->json([
                'success' => true,
                'cart'    => $cart,
                'message' => 'Product is successfully removed from cart.'
            ]);
        }
    }

    public function update(Request $request)
    {
        if ($request->product_id && $request->qty) {
            $cart = session()->get('cart');
            // Check if the product already exists in the cart
            $productExists = false;
            foreach ($cart['products'] ?? [] as $key => $product) {
                $cart['products'][$key]['product_total_amount'] = $product['quantity'] * $product['price'];
                if ($product['id'] == $request->product_id) {
                    $cart['products'][$key]['quantity'] = $request->qty;
                    $cart['products'][$key]['product_total_amount'] = $request->qty * $product['price'];
                    $productExists = true;
                    break;
                }
            }

            if (!$productExists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found in the cart.'
                ]);
            }

            // Recalculate cart totals
            $cart_quantity = 0;
            $sub_total = 0;
            foreach ($cart['products'] as $product) {
                $cart_quantity += $product['quantity'];
                $sub_total += $product['quantity'] * $product['price'];
            }

            // Update cart totals
            $cart['quantity'] = $cart_quantity;
            $cart['sub_total'] = $sub_total;
            $cart['formatted_sub_total'] = '$'.(number_format($sub_total ,2));


            $applied_coupons = $cart['discount'] ?? [];
            $cart['discount'] = $applied_coupons;
            if($cart['discount']) {
                $sub_total -= $cart['discount_amount'];
                $cart['grand_total'] =  $sub_total;
                $cart['formatted_grand_total'] = '$'. Number_Format( $cart['grand_total'] , 2);
                $cart['discount'] = $cart['discount'];
                $cart['discount_amount'] = $cart['discount_amount'];
            } else {
                $cart['grand_total'] = $sub_total;
                $cart['formatted_grand_total'] = '$'.(number_format($sub_total ,2));
                $cart['discount'] = 0;
                $cart['discount_amount'] = 0;
            }

            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = $cart['grand_total'] + $cart['tax'];

            $cart['count']  = count($cart['products']);
            session()->put('cart', $cart);
            if (Auth::check()) {
                $user_id = Auth::id();
                Cart::updateOrCreate(
                    ['user_id' => $user_id],
                    ['cart' => json_encode($cart)]
                );
            }
    
            $discounts = Discount::where('quantity', '<=', $cart_quantity)->get();
            $discountOptions = '<option selected disabled>Select Discount</option>';
            if ($discounts->count() > 0) {
                foreach ($discounts as $discount) {
                    $discountOptions .= '<option value="' . $discount->discount . '">' . $discount->discount . '%</option>';
                }
            }
            return response()->json([
                'success' => true,
                'cart' => $cart,
                'discountOptions' => $discountOptions,
                'message' => 'Cart quantity updated successfully.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product ID and quantity are required.'
            ]);
        }
    }

    public function discountApply(Request $request)
    {
        $discount = Discount::where('discount', $request->discount)->first();
        if($discount) {
            $cart = session()->get('cart');
            if(session('cart')['discount']) {
                unset($cart['discount']);
                $cart['discount'] = isset($cart['discount']) ? $cart['discount'] : [];
                 $cart['discount_percentage'] = $request->discount;
                $cart['discount_amount'] = isset($cart['discount_amount']) ? $cart['discount_amount'] : 0;
                $cart['grand_total'] = $cart['sub_total'];
                $cart['formatted_grand_total'] = '$'. Number_Format( $cart['sub_total'] , 2);
            }
            if(session('cart')['products']) {
                $discountAmount = ($request->discount / 100) * $cart['sub_total'];
                $cart['grand_total'] -= $discountAmount;
                $cart['formatted_grand_total'] = '$'. Number_Format( $cart['grand_total'] , 2);
                $cart['discount_amount'] = $discountAmount;

                $cart['discount'] = [
                    'id'              => $discount->id,
                    'discount_percentage'=> $request->discount,
                    'discount_amount' => $discountAmount,
                ];

                $cart['tax'] = $cart['grand_total'] * 0.15;
                $cart['payable'] = $cart['grand_total'] + $cart['tax'];

                session()->put('cart', $cart);
                if (Auth::check()) {
                    Cart::updateOrCreate(
                        ['user_id' => Auth::id()],
                        ['cart' => json_encode($cart)]
                    );
                }
                return response()->json([
                    'success' => true,
                    'cart'    => $cart,
                    'message' => 'Discount applied'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'cart item is empty.'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Discount does not exist or is not valid'
            ]);
        }
    }
}