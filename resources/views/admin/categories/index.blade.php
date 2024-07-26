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
            <div class="table-responsive p-0 m-0">
                <table id="categories-table" class="table categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @foreach($categories as $key => $category)
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
                                     <a class="me-2 p-2 delete-product" data-id="{{$category->id}}"  href="#">
                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                    </a> 
                                </div>
                            </td>
                        </tr>
                        @endforeach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.categories-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('get-categories') }}",
                "type": "POST",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },
            columns: [
                { "data": "id" },
                { "data": "name" },
                { 
                    "data": "image",
                    "render": function(data, type, row) {
                        return `<img src="{{url('')}}/${row.image}" alt="${row.name}" style="width: 50px; height: 50px;">`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 edit-btn" href="./categories/${row.id}/edit">`;
                        actions += '<i class="fa fa-edit"></i>';
                        actions += '</a>';

                        if (row.status == 1) {
                            actions += '<a class="me-2 p-2 delete-btn" id="restore-category" data-id="' +
                                row.id + '" href="#">Restore</a>';
                            actions += '<a class="me-2 p-2 delete-btn" id="delete-category" data-id="' + row.id +
                                '" style="display: none;"><i class="fa fa-trash"></i></a>';
                        } else {
                            actions += '<a class="me-2 p-2 delete-btn" id="delete-category" data-id="' +
                                row.id + '" href="#"><i class="fa fa-trash"></i></a>';
                            actions += '<a class="me-2 p-2 delete-btn" id="restore-category" data-id="' +
                                row.id + '" style="display: none;">Restore</a>';
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    "orderable": false,
                    "targets": 3,  // Adjust this index based on the actual number of columns
                    "className": "action-table-data"
                }
            ],
            paging: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function(e) {
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

