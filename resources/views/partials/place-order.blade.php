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
                                <label>Customer Name <small style="color:red;">*</small></label>
                                <select name="order_customer_id" class="form-control chosen-select" required>
                                    <option></option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->customer_name }}"
                                            data-customer-id="{{ $customer->id }}"
                                            data-customer-contact = "{{ $customer->contact_number }}"
                                            data-customer-email = "{{ $customer->customer_email }}"
                                            data-customer-billing = "{{ $customer->billing_address }}"
                                            data-billing-pincode = "{{ $customer->billing_address_pin_code }}" 
                                        >{{ $customer->customer_name.' ( '.$customer->contact_number.' )' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Email (Optional)</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Contact No. <small style="color:red;">*</small></label>
                                <input type="number" name="contact_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Pincode <small style="color:red;">*</small></label>
                                <input type="text" name="billing_address_pin_code" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Billing Address <small style="color:red;">*</small></label>
                                <textarea name="billing_address" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="block-section payment-method">
                        <h6>Payment Method <small style="color:red;">*</small></h6>
                        <div class="row d-flex align-items-center justify-content-center methods">
                            <div class="col-md-6">
                                <div class="default-cover method" data-method="cash">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/cash-pay.svg"
                                        alt="Payment Method">
                                    <span>Cash</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="default-cover method" data-method="debit-card">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                        alt="Payment Method">
                                    <span>Debit/ Credit Card</span>
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
                                placeholder="Change Amount" readonly>
                        </div>
                        <div class="col-md-6 col-lg-4 item">

                        </div>
                    </div>
                    <div class="row" id="method-card">
                        <div class="col-md-6 col-lg-4 item">
                            <input type="text" name="card_digits" class="form-control" placeholder="Enter Card Last 4 Digits" maxlength="4" 
                            pattern="\d{4}"  title="Enter card last 4 digits"  oninput="validateCardDigits(this)" required>
                            {{-- <input type="number" name="card_digits" class="form-control" min= 
                                placeholder="Enter Card Last 4 Digits">--}}
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
                        <button class="btn btn-submit me-2" id="order-submission">Place</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('[data-method="cash"]').click(function(){
            $.ajax({
                url: "{{ route('open-cash-drawer') }}",
                method: 'GET'
            })
        })
    })
    function validateCardDigits(input) {
    let value = input.value;
    // Remove non-numeric characters
    value = value.replace(/\D/g, '');
    // Limit to 4 digits
    if (value.length > 4) {
        value = value.slice(0, 4);
    }
    // Update the input field with the valid value
    input.value = value;
}
</script>
{{-- Place Order End --}}