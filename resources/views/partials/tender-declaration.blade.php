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
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function(){
            var shouldShowModal = {{ session('#tender-declaration-modal', 'false') ? 'true' : 'false' }};
            if (shouldShowModal === 'true') {
                $('#tender-declaration-modal').modal('show');
            }
        $('#submitTender').validate({
            rules: {
                collect_tender_amount: {
                    required: true,
                    number: true,
                    min: 0
                }
            },
            messages: {
                collect_tender_amount: 'Please Enter a valid Tender Amount'
            },
            errorClass: 'error-message',
            submitHandler: function(form) {
                var tenderAmount = $(form).find('input[name="collect_tender_amount"]').val();
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: '{{ route('save.tender') }}',
                    type: 'post',
                    data: {
                        "_token": token,
                        tender_amount: tenderAmount
                    },
                    success: function(response) {
                        window.location.href = '{{ route('login') }}';  // Redirect to logout route
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }
        });

        $('#tender-declaration-modal').on('hide.bs.modal', function (e) {
            e.preventDefault();
        });
    });
</script>