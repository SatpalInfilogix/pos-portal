@php
use Illuminate\Support\Facades\DB;
$customers = DB::table('customers')->get();
@endphp
   {{-- Place Order --}}
   <div class="modal fade" id="place-order" tabindex="-1" aria-labelledby="place-order" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INVOICE ID : <span id="invoice-id">{{ $invoiceId ?? '' }}</span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="place-order" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Customer Name</label>
                                <select name="order_customer_id" class="form-control chosen-select" required>
                                    <option></option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->customer_name }}"
                                            data-customer-id="{{ $customer->id }}"
                                            data-customer-contact = "{{ $customer->contact_number }}"
                                            data-customer-alternate = "{{ $customer->alternate_number }}"
                                            data-customer-billing = "{{ $customer->billing_address }}"
                                            data-customer-shipping = "{{ $customer->shipping_address }}" 
                                            data-shipping-pincode = "{{ $customer->shipping_address_pin_code }}" 
                                            data-billing-pincode = "{{ $customer->billing_address_pin_code }}" 
                                        >{{ $customer->customer_name.' ( '.$customer->contact_number.' )' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Vehicle Number</label>
                                <input type="text" name="vehicle_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Contact No.</label>
                                <input type="text" name="contact_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Alternate Contact No.</label>
                                <input type="text" name="alternate_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Shipping Address</label>
                                <textarea name="shipping_address" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Billing Address</label>
                                <textarea name="billing_address" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Shipping Pincode</label>
                                <input type="text" name="shipping_address_pin_code" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Billing Pincode</label>
                                <input type="text" name="billing_address_pin_code" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="block-section payment-method">
                        <h6>Payment Method</h6>
                        <div class="row d-flex align-items-center justify-content-center methods">
                            <div class="col-md-6 col-lg-4 item">
                                <div class="default-cover method" data-method="cash">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/cash-pay.svg"
                                        alt="Payment Method">
                                    <span>Cash</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 item">
                                <div class="default-cover method" data-method="debit-card">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                        alt="Payment Method">
                                    <span>Debit Card</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 item">
                                <div class="default-cover method" data-method="credit">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                        alt="Payment Method">
                                    <span>credit</span>
                                </div>
                            </div>
                            <input type="hidden" name="payment-method" id="payment-method">
                        </div>
                    </div>
                    <div class="row" id="method-cash">
                        <div class="col-md-6 col-lg-4 item">
                            <input type="number" name="tender_amount" class="form-control"
                                placeholder="Tender Amount">
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <input type="number" name="order_change_amount" class="form-control"
                                placeholder="Change Amount">
                        </div>
                        <div class="col-md-6 col-lg-4 item">

                        </div>
                    </div>
                    <p class="grand-total"> Grand Total :
                        @php
                            $cart = session('cart');
                            $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                        @endphp
                        <span class="payable">${{ $payable }}</span>
                    </p>

                    <div class="modal-footer d-sm-flex justify-content-end">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-submit me-2">Place</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Place Order End --}}