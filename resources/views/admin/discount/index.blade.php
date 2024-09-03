@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Discount List</h4>
                    <h6>Manage your discount</h6>
                </div>
            </div>

            @canany(['create discounts'])
                <div class="page-btn">
                    <a href="{{ route('discounts.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add Discount
                    </a>
                </div>
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
                    <table id="example" class="table table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discounts as $key => $discount)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ ucwords($discount->roleName) }} </td>
                                    <td>{{ $discount->discount ? $discount->discount . '%' : '0%' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script>
@endsection
