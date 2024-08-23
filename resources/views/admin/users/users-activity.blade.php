@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Users Activities List</h4>
                    <h6>Manage your users Activities</h6>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Date</label>
                <input type="text" name="date" id="date" class="form-control">
            </div>
            
        </div>
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="users-activity-table" class="table users-activity-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#date').datepicker({
                format: 'yyyy-mm-dd', // specify the format you want
                todayHighlight: true,
                autoclose: true,
                orientation: 'bottom'
            });
        });

        $(function() {
            let usersTable = $('.users-activity-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-users-activity') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.date = $('#date').val();
                        return d;
                    }
                },
                columns: [
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        title: '#'
                    },
                    { "data": "first_name" },
                    { "data": "last_name" },
                    {
                        "data": "logged_in",
                        "render": function(data, type, row) {
                            return data ? formatDate(data) : ' ';
                        }
                    },
                    {
                        "data": "logged_out",
                        "render": function(data, type, row) {
                            return data ? formatDate(data) : ' ';
                        }
                    }
                ],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [[0, 'desc']]
            });

            $('#date').on('change', function() {
                usersTable.ajax.reload(); // Reload the table data
            });
        });
    </script>
@endsection
