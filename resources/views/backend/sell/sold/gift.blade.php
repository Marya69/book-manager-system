@extends('backend.sell.master')
@section('title', 'Sold Prodect')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">All Gift </h6>
                </div>
                <div class="ms-auto">
                    {{-- <div class="btn-group">
                    <a href="" class="btn btn-success"><i
                            class="bx bx-list-plus pb-1"></i>Add
                        Book Expenses
                    </a>

                </div> --}}
                </div>
            </div>
            <!--end breadcrumb-->

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>

                                <tr>
                                    <th>#</th>

                                    <th>Order Date</th>
                                    <th>Name Saller</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $o)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $o->order_date }}</td>
                                        <td>{{ $o->name_seller }}</td>





                                        <td>
                                            <a href="javascript:void(0)" id="show-order"
                                                data-url="{{ route('View.Order.gift', $o->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"></i></a>

                                            <div class="modal fade" id="exampleLargeModal" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Order Detail</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table id="example"
                                                                            class="table table-striped table-bordered"
                                                                            style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Name Product</th>
                                                                                    <th>Quantity</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="order-details">
                                                                                <!-- Render order details table -->
                                                                                {{-- @foreach ($order as $key => $od) --}}
                                                                                {{-- <tr id="order-details"> --}}

                                                                                {{-- <td></td>
                                                                                    <td>
                                                                                    </td>
                                                                                    <td>
                                                                                    </td> --}}
                                                                                {{-- </tr> --}}
                                                                                {{-- @endforeach --}}
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- finish this wiew wow zore pechu --}}

                                            <a href="{{ route('undogift', $o->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-undo"></i></a>


                                        </td>



                                    </tr>
                                @endforeach



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('script')
    {{-- <script>
        // Define the undo function globally
        function undo(id) {
            $.post('undo', {
                id: id,
                _token: '{{ csrf_token() }}'
            }, function(response) {
                if (response === "s") {
                    console.log('ss'); // Output success message
                } else {
                    console.log('ff'); // Output failure message
                }
            });
        }
    </script> --}}
    <script>
        $(document).ready(function() {

            // function undo(id) {
            //     $.post('undo', {
            //         id: id,
            //         _token: '{{ csrf_token() }}'
            //     }, function(response) {
            //         if (response === "s") {
            //             console.log('ss'); // Output success message
            //         } else {
            //             console.log('ff'); // Output failure message
            //         }
            //     });
            // }

            $('body').on('click', '#show-order', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#exampleLargeModal').modal('show');
                    $('#order-details').empty();
                    var orderDetailsHTML = '';
                    var sum = 0;
                    $.each(data, function(index, order) {
                        sum++; // Increment sum for each iteration
                        orderDetailsHTML += '<tr>';
                        orderDetailsHTML += '<td>' + sum +
                            '</td>'; // Display the incremented sum
                        orderDetailsHTML += '<td>' + order.name + '</td>';
                        orderDetailsHTML += '<td>' + order.qty + '</td>';
                        // Add more lines to append other order details as needed
                        orderDetailsHTML += '</tr>';
                    });

                    // $('#name').text(data.name)

                    $('#order-details').html(orderDetailsHTML);



                });


            });


        });
    </script>

@endsection
