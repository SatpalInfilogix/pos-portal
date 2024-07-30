@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Stores List</h4>
                    <h6>Manage your stores</h6>
                </div>
            </div>

            <div class="page-btn">
                <a href="{{ route('stores.create') }}" class="btn btn-added">
                    <i data-feather="plus-circle" class="me-2"></i>
                    Add Store
                </a>
            </div>
            <!-- <div class="page-btn import">
                                                        <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                                                                data-feather="download" class="me-2"></i>Import Product</a>
                                                    </div> -->
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="users-table" class="table users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->email }}</td>
                                    <td>{{ $store->contact_number }}</td>
                                    <td>{{ $store->location }}</td>
                                    <td class="no-sort"><a class="me-2 p-2" href="{{ route('stores.edit',$store->id) }}">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


