@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfers</h4>
                    <h6>Manage Inventory Transfers</h6>
                </div>
            </div>

            @canany(['create inventory transfers'])
                <div class="page-btn">
                    <a href="{{ route('inventory-transfer.create') }}" class="btn btn-added">
                        <i data-feather="truck" class="me-2"></i>
                        Transfer new items
                    </a>
                </div>
            @endcanany
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Store</label>
                @hasanyrole('Super Admin')
                <select name="store" id="inventory-store" class="form-control" >
                    <option value="">select store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @selected($store->id == auth()->user()->store_id)>{{ $store->name }}</option>
                    @endforeach
                </select>
                @endhasanyrole
            </div>
        </div>
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="inventory-transfer" class="table inventory-transfer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store</th>
                                <th>Store Contact</th>
                                <th>Vehicle Number</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                                <th>Action</th>
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
var userRole = "{{ auth()->user()->getRoleNames()->first() }}";
$(function() {
    let inventoryTable = $('.inventory-transfer').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('get-transfer-stock-inventory') }}",
                "type": "POST",
                "data": function(d){
                    d._token = "{{ csrf_token() }}";
                    d.store_id = $('#inventory-store').val();
                    return d;
                }
            },
            columns: [
                { "data": "id" },
                { "data": "store_name" },
                { "data": "store_contact" },
                { "data": "vehicle_number"},
                { "data": "status",
                    "render" : function(data, type, row) {
                        //return formatDate(data);
                        let color;
                        switch(data) {
                            case 'Pending':
                                color = 'orange'; 
                                break;
                            case 'Delivered':
                                color = 'red';
                                data = 'Not received all items' 
                                break;
                            case 'Received':
                                color = 'green'; 
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
                        return formatDate(data);
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 edit-btn" href="{{ route('inventory-transfer.show','') }}/${data.id}">`;
                        actions += '<i class="fa fa-eye"></i>';
                        actions += '</a>';
                        console
                        if (userRole === 'Super Admin' || userRole === 'Admin') {
                            actions += `<a class="me-2 p-2" href="#" id="open-gatepass-model" data-vehicle-number="${data.vehicle_number}" data-transfer-id="${data.id}">`;
                            actions += '<i class="fa fa-download"></i>&nbsp;Generate Gate Pass';
                            actions += '</a>';
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    "orderable": false,
                    "targets": 6, // Adjust target index if necessary
                    "className": "action-table-data"
                } // Disable sorting on 'Action' column
            ],
            paging: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });
        $(document).on('change', '#inventory-store', function() {
            inventoryTable.ajax.reload();
        });
    });
    $(document).on('click','#open-gatepass-model',function(e){
        e.preventDefault();
        var transfer_id = $(this).data('transfer-id');
        var vehicle_number = $(this).data('vehicle-number');
        $('[name="transfer-id"]').val(transfer_id);
        $('#vehicle-number').val(vehicle_number);
        $('#gate-pass-modal').modal('show');
    });

    $(document).on('click','#generate-gatepass',function(){
        
        var transfer_id = $('[name="transfer-id"]').val();
        var vehicle_number = $('[name="vehicle-number"]').val();
        if(!vehicle_number){
            alert('Please Enter Vehicle Number');
            return false;
        }
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url : "{{ route('print.gatepass','') }}/"+transfer_id,
            type : 'POST',
            data : {
                _token,
                vehicle_number
            },
            success : function(resp){
                if(resp.success){
                    window.open(`{{ route('view.gatepass', '') }}/${transfer_id}`);
                    location.reload();
                    $('#gate-pass-modal').modal('hide');
                }
            }
        });
    }); 

    </script>
@endsection
