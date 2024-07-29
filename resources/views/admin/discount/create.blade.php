@extends('admin.layouts.app')
    @section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New Discount</h4>
                    <h6>Create new discount</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('discounts.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to Discounts</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('discounts.store') }}" method="post" enctype="multipart/form-data" id='product-form'>
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            @foreach($roles as $role)
                                <h5>{{ ucwords($role->name) }}</h5>
                                <input type="hidden" name="role[]" value="{{ $role->id }}">
                                <div class="row">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Discount</label></label>
                                        <input type="text" name="discount[]" id="discount" class="form-control" value="{{ $role->discount }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-addproduct mb-4">
                            <button type="submit" class="btn btn-submit">Save Discount</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection

