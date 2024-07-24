<div class="modal fade" id="gate-pass-modal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title">Gate Pass</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="onhold" role="tabpanel"
                                aria-labelledby="onhold-tab">
                                <div class="form-group" id="searchbox">
                                    <input type="search" class="form-control form-control-sm" placeholder="Search" name="search-invoice" id="search-invoice"><a href="#"
                                    class="btn btn-info btn-icon flex-fill" name="get-details">Get Details</a>
                                </div>
                                <div class="order-body" id="g-invoice-details">
                                    <div class="default-cover p-4 mb-4">
                                        <span class="badge bg-secondary d-inline-block mb-4">Invoice ID : <span id="g-invoice-id"></span></span>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 record mb-3">
                                                <table>
                                                    <tr class="mb-3">
                                                        <td>Cashier</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="g-cashier"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="g-customer"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-12 col-md-6 record mb-3">
                                                <table>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="g-totalAmount"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="g-inv-date"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <p class="p-4">Customer need to recheck the product once</p>
                                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                                            <a href="#" id="g-view-invoice"
                                                class="btn btn-info btn-icon flex-fill" target="_blank">Print</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="g-error-msg" style="color:red">Invoice Not found</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         $(document).on('click','[name="get-details"]',function(){
            var invoice_id = $('[name="search-invoice"  ]').val();
            $.ajax({
                url : "{{ url('admin/search-invoice') }}/"+invoice_id,
                type : 'GET',
                success : function(resp){
                    if(resp.invoice){
                        $('#g-invoice-details').show();
                        $('#g-error-msg').hide();
                        $('span#g-invoice-id').text(resp.invoice.OrderID);
                        $('#g-customer').text(resp.invoice.CustomerName);
                        $('#g-cashier').text('Admin');
                        $('#g-totalAmount').text(resp.invoice.TotalAmount);
                        $('#g-inv-date').text(resp.invoice.OrderDate);
                        var viewURL = "{{ url('/admin/print-gatepass/') }}/"+resp.invoice.OrderID;
                        $('#g-view-invoice').attr('href',viewURL);
                    }else{
                        $('#g-invoice-details').hide();
                        $('#g-error-msg').show();
                    }
                }
            });
        }); 
    </script>