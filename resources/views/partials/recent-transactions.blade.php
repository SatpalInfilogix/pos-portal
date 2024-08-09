  <div class="modal fade pos-modal" id="recent-transactions" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header p-4">
                  <h5 class="modal-title">Recent Transactions</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body p-4">
                  <div class="tabs-sets">
                      <div class="tab-content">
                          {{-- <div class="table-top"> --}}
                              {{-- <div class="search-set">
                                  <div class="search-input"></div>
                              </div> --}}
                          {{-- </div> --}}
                          <div class="table-responsive p-0 m-0">
                              <table class="table datanew transaction-table" id="transaction-table">
                                  <thead>
                                      <tr>
                                          <th>Customer Name</th>
                                          <th>Invoice Id</th>
                                          <th>Date</th>
                                          <th>Amount </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      {{-- <tr>
                                            <td>19 Jan 2023</td>
                                            <td>INV/SL0101</td>
                                            <td>Walk-in Customer</td>
                                            <td>$1500.00</td>
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2" href="javascript:void(0);"><i
                                                            data-feather="eye" class="feather-eye"></i></a>
                                                    <a class="me-2 p-2" href="javascript:void(0);"><i
                                                            data-feather="edit" class="feather-edit"></i></a>
                                                    <a class="p-2 confirm-text" href="javascript:void(0);"><i
                                                            data-feather="trash-2"
                                                            class="feather-trash-2"></i></a>
                                                </div>
                                            </td>
                                        </tr> --}}

                                  </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('[data-bs-target="#recent-transactions"]').click(function(){
            // Initialize DataTable
            $('.transaction-table').DataTable().destroy();

            $('.transaction-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-transaction') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [
                    { data: "CustomerName" },
                    { data: "OrderID" },
                    { data: "created_at",
                        render: function(data, type, row) {
                            var date = new Date(data);

                            var day = String(date.getDate()).padStart(2, '0');
                            var month = String(date.getMonth() + 1).padStart(2, '0');
                            var year = date.getFullYear();
                            var hours = String(date.getHours()).padStart(2, '0');
                            var minutes = String(date.getMinutes()).padStart(2, '0');
                            var seconds = String(date.getSeconds()).padStart(2, '0');

                            var formattedDateTime = `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;

                            return formattedDateTime;
                        }
                    },
                    {
                        data: "TotalAmount",
                        render: function(data, type, row) {
                                return `$${parseFloat(data).toFixed(2)}`;
                            }
                    },
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1, // Target the last column for non-orderable actions
                    className: "action-table-data"
                }],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });
        });
    });
</script>
