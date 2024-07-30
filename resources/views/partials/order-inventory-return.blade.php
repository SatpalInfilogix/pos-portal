<div class="modal fade" id="order-inventory-return" tabindex="-1" aria-labelledby="order-inventory-return" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INVOICE ID : <span id="invoice-id">{{ $invoice->OrderID ?? '' }}</span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="return-stock" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Vehicle Number</label>
                                <input type="text" name="vehicle_numbers" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>Contact No.</label>
                                <input type="text" name="contact_numbers" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>From Location</label>
                                <textarea name="from_location" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="input-blocks">
                                <label>To Location</label>
                                <textarea name="to_location" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="method-cash">
                        <div class="col-md-6 col-lg-4 item">
                            <input type="number" name="tender_amount" class="form-control" placeholder="Tender Amount">
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <input type="number" name="change_amount" class="form-control" placeholder="Change Amount">
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            
                        </div>
                    </div>

                    
                    <div class="modal-footer d-sm-flex justify-content-end">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-submit me-2">Returned Stock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>