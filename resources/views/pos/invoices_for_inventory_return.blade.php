@extends('admin.layouts.frontend.app')
@section('content')
    <div class="content pos-design p-0">
        <div class="row flex justify-content-center mt-5">
            @if (count($invoices) > 0)
                <div class="col-md-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            @foreach ($invoices as $invoice)
                                <h5>{{ $invoice }}</h5>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h4 class="text-center">No invoice data for inventory return</h4>

                            <p class="text-center mt-4">Redirecting to main page...</p>
                        </div>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        window.location = `{{ route('pos-dashboard') }}`;
                    }, 3500);
                </script>
            @endif
        </div>
    </div>

    <form action="{{ route('return-inventory') }}" name="return-inventory-form" method="post"
        @if (count($invoices) > 1) target="_blank" @endif>
        @csrf
        <input type="hidden" name="invoice_id" value="{{ count($invoices) == 1 ? $invoices[0] : '' }}">
    </form>

    <script>
        $(function() {
            if ($('[name="invoice_id"]').val()) {
                $('[name="return-inventory-form"]').submit();
            }
        })
    </script>
@endsection
