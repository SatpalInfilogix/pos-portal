<div class="modal fade" id="tender-declaration-modal" tabindex="-1"
        aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title">Today Tender Amount</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="tabs-sets">
                    <div class="tab-content">
                        <form action="" id="submitTender">
                            <div class="row">
                                <input name="collect_tender_amount" type="text" placeholder="Please enter tender amount" class="form-control">
                                <small></small>
                            </div>
                            <div class="row m-2">
                                <button type="submit" class="btn btn-primary">Submit & Logout</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#submitTender').validate({
            rules : {
                collect_tender_amount : 'required'
            },
            messages : {
                collect_tender_amount :  'Please Enter Tender Amount'
            },
            errorClass: 'error-message' 
        });
    });
</script>