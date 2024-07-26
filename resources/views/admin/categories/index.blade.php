@extends('admin.layouts.app')

@section('content')
<div class="content">
                <div class="page-header">
                    <div class="add-item d-flex">
                        <div class="page-title">
                            <h4>Categories List</h4>
                            <h6>Manage your categories</h6>
                        </div>
                    </div>
                   
                    <div class="page-btn">
                    <a href="{{ route('categories.create') }}" class="btn btn-added"><i data-feather="plus-circle"
                            class="me-2"></i>Add New Category</a>
                    </div>
                    <!-- <div class="page-btn import">
                        <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                                data-feather="download" class="me-2"></i>Import Product</a>
                    </div> -->
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card table-list-card">
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table dashboard-expired-products">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->name }} </td>
                                        <td><img src="{{ asset($category->image) }}" width="50" height="50"></td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="{{ route('categories.edit', $category->id) }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                @if($category->status == 1)
                                                    <a class="me-2 p-2 delete-product" id="restore-category" data-id="{{ $category->id }}" href="#">Restore</a>
                                                    <a class="me-2 p-2 delete-product" id="delete-category" data-id="{{$category->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                @else 
                                                    <a class="me-2 p-2 delete-product" id="delete-category" data-id="{{$category->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    <a class="me-2 p-2 delete-product" id="restore-category" data-id="{{ $category->id }}" style="display: none;">Restore</a>
                                                @endif
                                                <!-- <a class="me-2 p-2 delete-product" data-id="{{$category->id}}"  href="#">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a> -->
                                            </div>
                                        </td>
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
                    $('.delete-product').click(function(e) {
                        e.preventDefault();
                        var productId = $(this).data('id');
                        var token = "{{ csrf_token() }}";
                        var url = "{{ route('categories.destroy','') }}/" + productId; // Use Laravel helper for URL

                        if (confirm('Are you sure you want to delete this Category?')) {
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    "_token": token,
                                },
                                success: function(response) {
                                    if(response.status == 'success') {
                                        if(response.categoryStatus == 1) {
                                            $('#restore-category[data-id="' + productId + '"]').show();
                                            $('#delete-category[data-id="' + productId + '"]').hide();
                                        } else {
                                            $('#restore-category[data-id="' + productId + '"]').hide();
                                            $('#delete-category[data-id="' + productId + '"]').show();
                                        }
                                    } else {
                                        alert('Something went wrong. Please try again.');
                                    }
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                    alert('Something went wrong. Please try again.');
                                }
                            });
                        }
                    });
                });

            </script>
@endsection

