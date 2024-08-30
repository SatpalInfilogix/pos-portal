@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Return Stocks</h4>
                    <h6>Manage Return Stocks</h6>
                </div>
            </div>

            @canany(['create return stocks'])
                @if(auth()->user()->store_id != null)
                    <div class="page-btn">
                        <a href="{{ route('return-stock.create') }}" class="btn btn-added">
                            <i data-feather="truck" class="me-2"></i>
                            Return stock items
                        </a>
                    </div>
                @endif    
            @endcanany
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="return-stock-inventory" class="table return-stock-inventory">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store</th>
                                <th>Store Contact</th>
                                <th>Vehicle Number</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.gate-pass')
@section('script')
    <script>
        $(function() {
            var store_id = '{{ auth()->user()->store_id }}';
            $('.return-stock-inventory').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('get-return-stock-inventory') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "store_name"
                    },
                    {
                        "data": "store_contact"
                    },
                    {
                        "data": "vehicle_number"
                    },
                    { "data": "status",
                        "render" : function(data, type, row) {
                            //return formatDate(data);
                            let color;
                            switch(data) {
                                case 'delivered':
                                    color = 'orange'; 
                                    data = 'Pending'; 
                                    break;
                                case 'recieved_not_all':
                                    color = 'red';
                                    data = 'Not received all items'; 
                                    break;
                                case 'received':
                                    color = 'green';
                                    data = 'Received'; 
                                    break;
                                default:
                                    color = 'black'; 
                                    break;
                            }
                            return `<span style="color: ${color};">${data}</span>`;
                        }
                    },
                    {
                        "data": "created_at",
                        "render": function(data, type, row) {
                            var date = new Date(data);

                            var day = ('0' + date.getDate()).slice(-2); // Ensure two-digit day
                            var month = date.toLocaleString('en-US', { month: 'long' }); // Full month name
                            var year = date.getFullYear();

                            var hours = date.getHours();
                            var minutes = ('0' + date.getMinutes()).slice(-2);
                            var seconds = ('0' + date.getSeconds()).slice(-2);

                            var ampm = hours >= 12 ? 'PM' : 'AM';
                            hours = hours % 12;
                            hours = hours ? hours : 12; // the hour '0' should be '12'
                            
                            var dateString = `${day} ${month} ${year}`;
                            var timeString = `${hours}:${minutes}:${seconds} ${ampm}`;

                            return `${dateString} ${timeString}`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-invoice">';
                            actions +=
                                `<a class="me-2 p-2 edit-btn" href="{{ route('return-stock.show', '') }}/${data.id}">`;
                            actions += '<i class="fa fa-eye"></i>';
                            actions += '</a>';
                            if (store_id){
                                actions += `<a class="me-2 p-2" href="#" id="open-return-gatepass-model" data-vehicle-number="${data.vehicle_number}" data-return-id="${data.id}">`;
                                actions += '<i class="fa fa-download"></i>&nbsp;Generate Gate Pass';
                                actions += '</a>';
                            }
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                        "orderable": false,
                        "targets": 5, // Adjust target index if necessary
                        "className": "action-table-data"
                    } // Disable sorting on 'Action' column
                ],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });
        });

    $(document).on('click','#open-return-gatepass-model',function(e){
        e.preventDefault();
        var return_id = $(this).data('return-id');
        var vehicle_number = $(this).data('vehicle-number');
        $('[name="transfer-id"]').val(return_id);
        $('#vehicle-number').val(vehicle_number);
        $('#gate-pass-modal').modal('show');
    });

    $(document).on('click','#generate-gatepass',function(){
        
        var return_id = $('[name="transfer-id"]').val();
        var vehicle_number = $('[name="vehicle-number"]').val();
        if(!vehicle_number){
            alert('Please Enter Vehicle Number');
            return false;
        }
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url : "{{ route('return.stock.gatepass','') }}/"+return_id,
            type : 'POST',
            data : {
                _token,
                vehicle_number
            },
            success : function(resp){
                if(resp.success){
                    window.open(`{{ route('view.return.gatepass', '') }}/${return_id}`);
                    location.reload();
                    $('#gate-pass-modal').modal('hide');
                }
            }
        });
    }); 
    </script>
    
@endsection
