<div class="modal fade pos-modal" id="orders" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title">Orders</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="tabs-sets">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="onhold-tab" data-bs-toggle="tab"
                                data-bs-target="#onhold" type="button" aria-controls="onhold" aria-selected="true"
                                role="tab">Onhold</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="unpaid-tab" data-bs-toggle="tab" data-bs-target="#unpaid"
                                type="button" aria-controls="unpaid" aria-selected="false"
                                role="tab">Unpaid</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid"
                                type="button" aria-controls="paid" aria-selected="false" role="tab">Paid</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="onhold" role="tabpanel"
                            aria-labelledby="onhold-tab">
                            <div class="table-top">
                                <div class="search-set w-100 search-order">
                                    <input type="text" class="form-control" placeholder="Search" name="searchOrder">
                                </div>
                            </div>
                            <div class="order-body hold-orders">
                            @forelse ($holdOrders as $onHoldOrder)
                                <div class="default-cover p-4 search-order-box" data-invoice-id="{{ $onHoldOrder->OrderID}}">
                                    <span class="badge bg-secondary d-inline-block mb-4">Order ID : #{{ $onHoldOrder->OrderID}}</span>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr class="mb-3">
                                                    <td>Cashier</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">admin</td>
                                                </tr>
                                                <tr>
                                                    <td>Customer</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ $onHoldOrder->CustomerName ?? 'Guest' }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr>
                                                    <td>Total</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">${{ $onHoldOrder->TotalAmount }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ \Carbon\Carbon::parse($onHoldOrder->created_at)->format('d F, Y') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <p class="p-4 mb-4">Customer need to recheck the product once</p>
                                    {{-- <div class="btn-row d-flex align-items-center justify-content-between">
                                        <a href="{{ route('sales.view',$onHoldOrder->OrderID) }}" class="btn btn-info btn-icon flex-fill">Open</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-danger btn-icon flex-fill">Products</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-success btn-icon flex-fill">Print</a>
                                    </div> --}}
                                </div>
                                @empty
                                    <div class="record-not-found">
                                        <p>Orders Not Available</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="unpaid" role="tabpanel">
                            <div class="table-top">
                                <div class="search-set w-100 search-order">
                                    <input type="text" class="form-control" placeholder="Search" name="searchOrder">
                                </div>
                            </div>
                            <div class="order-body unpaid-orders">
                                @forelse ($unPaidOrders as $unPaidOrder)
                                <div class="default-cover p-4 search-order-box" data-invoice-id="{{ $unPaidOrder->OrderID}}">
                                    <span class="badge bg-secondary d-inline-block mb-4">Order ID : #{{ $unPaidOrder->OrderID}}</span>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr class="mb-3">
                                                    <td>Cashier</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">admin</td>
                                                </tr>
                                                <tr>
                                                    <td>Customer</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ $unPaidOrder->CustomerName }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr>
                                                    <td>Total</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">${{ $unPaidOrder->TotalAmount }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ \Carbon\Carbon::parse($unPaidOrder->created_at)->format('d F, Y') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <p class="p-4 mb-4">Customer need to recheck the product once</p>
                                    {{-- <div class="btn-row d-flex align-items-center justify-content-between">
                                        <a href="{{ route('sales.view',$unPaidOrder->OrderID) }}" class="btn btn-info btn-icon flex-fill">Open</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-danger btn-icon flex-fill">Products</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-success btn-icon flex-fill">Print</a>
                                    </div> --}}
                                </div>
                                @empty
                                    <div class="record-not-found">
                                        <p>Orders Not Available</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="paid" role="tabpanel">
                            <div class="table-top">
                                <div class="search-set w-100 search-order">
                                    <input type="text" class="form-control" placeholder="Search" name="searchOrder">
                                </div>
                            </div>
                            <div class="order-body completed-orders">
                                @forelse ($completedOrders as $completedOrder)
                                <div class="default-cover p-4 search-order-box" data-invoice-id="{{ $completedOrder->OrderID}}">
                                    <span class="badge bg-secondary d-inline-block mb-4">Order ID : #{{ $completedOrder->OrderID}}</span>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr class="mb-3">
                                                    <td>Cashier</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">admin</td>
                                                </tr>
                                                <tr>
                                                    <td>Customer</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ $completedOrder->CustomerName }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-md-6 record mb-3">
                                            <table>
                                                <tr>
                                                    <td>Total</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">${{ $completedOrder->TotalAmount }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td class="colon">:</td>
                                                    <td class="text">{{ \Carbon\Carbon::parse($completedOrder->created_at)->format('d F, Y') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <p class="p-4 mb-4">Customer need to recheck the product once</p>
                                    {{-- <div class="btn-row d-flex align-items-center justify-content-between">
                                        <a href="{{ route('sales.view',$completedOrder->OrderID) }}" class="btn btn-info btn-icon flex-fill">Open</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-danger btn-icon flex-fill">Products</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-success btn-icon flex-fill">Print</a>
                                    </div> --}}
                                </div>
                                @empty
                                    <div class="record-not-found">
                                        <p>Orders Not Available</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
