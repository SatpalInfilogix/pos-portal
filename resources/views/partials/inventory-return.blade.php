<div class="modal fade inventory-return-modal" id="inventory-return-modal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title">Inventory Return</h5>
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
                                    <input type="search" class="form-control form-control-sm" placeholder="Search" id="search-invoice"><a href="#"
                                    class="btn btn-info btn-icon flex-fill" id="get-details">Get Details</a>
                                </div>
                                <div class="order-body" id="invoice-details">
                                    <div class="default-cover p-4 mb-4">
                                        <span class="badge bg-secondary d-inline-block mb-4">Invoice ID : <span id="invoice-id"></span></span>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 record mb-3">
                                                <table>
                                                    <tr class="mb-3">
                                                        <td>Cashier</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="cashier"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="customer"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-12 col-md-6 record mb-3">
                                                <table>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="totalAmount"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date</td>
                                                        <td class="colon">:</td>
                                                        <td class="text" id="inv-date"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <p class="p-4">Customer need to recheck the product once</p>
                                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                                            <a href="#" class="btn btn-info btn-icon flex-fill return-inventory">Open</a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-icon flex-fill">Products</a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-success btn-icon flex-fill">Print</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="error-msg" style="color:red">Invoice Not found</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route("return-inventory") }}" name="return-inventory-form" method="post"       target="_blank">
        @csrf
        <input type="hidden" name="invoice_id">
    </form>

    <script>
        $(document).on('click','#get-details',function(){
            var invoice_id = $('#search-invoice').val();
            $.ajax({
                url : "{{ route('search.invoice', ':id') }}".replace(':id', invoice_id),
                type : 'GET',
                success : function(resp){
                    if(resp.invoice){
                        $('#invoice-details').show();
                        $('#error-msg').hide();
                        $('span#invoice-id').text(resp.invoice.OrderID);
                        $('#customer').text(resp.invoice.CustomerName);
                        $('#cashier').text('Admin');
                        $('#totalAmount').text(resp.invoice.TotalAmount);
                        $('#inv-date').text(resp.invoice.OrderDate);
                        /* var viewURL = "{{ url('/admin/view-invoice/') }}/"+resp.invoice.OrderID;
                        $('#view-invoice').attr('href',viewURL); */

                        $('.return-inventory').attr('data-invoice-id', resp.invoice.OrderID)
                    }else{
                        $('#invoice-details').hide();
                        $('#error-msg').show();
                    }
                }
            });
        });

        $(document).on('click', '.return-inventory', function(){
            let invoiceId = $(this).attr('data-invoice-id');
            $.ajax({
                url: '{{ route("set-invoice-for-inventory-return") }}',
                method: 'POST',
                data: { 
                    invoiceId,
                    _token: '{{ csrf_token() }}'
                },
                success:function(response){
                    if(response.success){
                        $('[name="invoice_id"]').val(invoiceId);
                        $('[name="return-inventory-form"]').submit();
                    }
                }
            })
        })
    </script>