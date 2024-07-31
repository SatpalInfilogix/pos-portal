@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfers</h4>
                    <h6>View Inventory Transfers</h6>
                </div>
            </div>

            <div class="page-btn">
                <a href="{{ route('inventory-transfer.index') }}" class="btn btn-added">
                    <i data-feather="arrow-left" class="me-2"></i>
                    Back
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <table class="">
                    <tr>
                        <td>Store : </td>
                        <td>Date :</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

