@extends('backend.sell.master')
@section('title', 'Main Page')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Number of books sold</p>
                                    <h4 class="my-1 text-info">{{ $tqp }}</h4>
                                    {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                        class='bx bxs-cart'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Number Product</p>
                                    <h4 class="my-1 text-danger">{{ $totalprodect }}</h4>
                                    {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                        class='bx bxs-book-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"> Number of Employees</p>
                                    <h4 class="my-1 text-success">{{ $totalemplyee }}</h4>
                                    {{-- <p class="mb-0 font-13">-4.5% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class='bx bxs-user-detail'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"> Number of Users</p>
                                    <h4 class="my-1 text-warning">{{ $totaluser }}</h4>
                                    {{-- <p class="mb-0 font-13">+8.4% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Number of books Gift</p>
                                    <h4 class="my-1 text-black">{{ $tqpg }}</h4>
                                    {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-moonlit text-white ms-auto"><i
                                        class='bx bxs-gift'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Money</p>
                                    <h4 class="my-1 text-warning"> {{ number_format($moneysum, 0) }} IQD</h4>
                                    {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-kyoto text-white ms-auto"><i
                                        class='bx bxs-gift'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end row-->



            <div class="container mt-5   d-none d-sm-flex align-items-center  ">
                <h4 class=" text-uppercase">Deatil Expenses</h4>




            </div>
            <hr>
            {{--  --}}
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                {{-- <h6 class="m-5 text-uppercase">Deatil Expenses</h6> --}}
                <div class="container mt-3">
                    <div class="d-flex align-items-left justify-content-left flex-wrap">
                        <div class="btn-group wrapper">
                            <button data-route="{{ route('update.e1.values') }}" class="btn btn-sm btn-outline-primary"
                                style="margin: 2px;">January</button>
                            <button data-route="{{ route('update.e2.values') }}" class="btn btn-sm btn-outline-secondary"
                                style="margin: 2px;">February</button>
                            <button data-route="{{ route('update.e3.values') }}" class="btn btn-sm btn-outline-success"
                                style="margin: 2px;">March</button>
                            <button data-route="{{ route('update.e4.values') }}" class="btn btn-sm btn-outline-danger"
                                style="margin: 2px;">April</button>
                            <button data-route="{{ route('update.e5.values') }}" class="btn btn-sm btn-outline-warning"
                                style="margin: 2px;">May</button>
                            <button data-route="{{ route('update.e6.values') }}" class="btn btn-sm btn-outline-info"
                                style="margin: 2px;">June</button>
                            <button data-route="{{ route('update.e7.values') }}" class="btn btn-sm btn-outline-danger"
                                style="margin: 2px;">July</button>
                            <button data-route="{{ route('update.e8.values') }}" class="btn btn-sm btn-outline-dark"
                                style="margin: 2px;">August</button>
                            <button data-route="{{ route('update.e9.values') }}" class="btn btn-sm btn-outline-primary"
                                style="margin: 2px;">September</button>
                            <button data-route="{{ route('update.e10.values') }}" class="btn btn-sm btn-outline-secondary"
                                style="margin: 2px;">October</button>
                            <button data-route="{{ route('update.e11.values') }}" class="btn btn-sm btn-outline-success"
                                style="margin: 3px;">November</button>
                            <button data-route="{{ route('update.e12.values') }}" class="btn btn-sm btn-outline-danger"
                                style="margin: 3px;">December</button>


                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>

                                <tr>


                                    <th>List of Expenses</th>

                                    <th>Amount</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>


                                    <td>
                                        Employee Expenses
                                    </td>
                                    <td id="e1">
                                        {{ $e1 ?? session('e1') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Course Expenses
                                    </td>
                                    <td id="e2">
                                        {{ $e2 ?? session('e2') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Book Expenses
                                    </td>
                                    <td id="e3">
                                        {{ $e3 ?? session('e3') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Reklam Expenses
                                    </td>
                                    <td id="e4">
                                        {{ $e4 ?? session('e4') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Rental Expenses
                                    </td>
                                    <td id="e5">
                                        {{ $e5 ?? session('e5') }}
                                    </td>





                                </tr>

                                <tr>


                                    <td>
                                        Technological Expenses
                                    </td>
                                    <td id="e6">
                                        {{ $e6 ?? session('e6') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Office Expenses
                                    </td>
                                    <td id="e7">
                                        {{ $e7 ?? session('e7') }}
                                    </td>




                                </tr>
                                <tr>


                                    <td>
                                        Balance Expenses
                                    </td>
                                    <td id="e8">
                                        {{ $e8 ?? session('e8') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Learning Expenses
                                    </td>
                                    <td id="e9">
                                        {{ $e9 ?? session('e9') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Personal Expenses
                                    </td>
                                    <td id="e10">
                                        {{ $e10 ?? session('e10') }}
                                    </td>





                                </tr>
                                <tr>


                                    <td>
                                        Exhibition Expenses
                                    </td>
                                    <td id="e11">
                                        {{ $e11 ?? session('e11') }}
                                    </td>





                                </tr>






                            </tbody>
                            <tfoot>
                                <h4 class="d-flex align-items-center justify-content-center" id="t">
                                    Total: {{ number_format($total, 0) }} IQD
                                </h4>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>


@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('button').click(function() {
                let route = $(this).data('route');
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        for (let i = 1; i <= 12; i++) {
                            $(`#e${i}`).text(response[`e${i}`]);
                            // $('#t').text(response.total);
                        }

                        $('#t').text(`Total: ${number_format(response.total, 0)} IQD`);
                    }
                });
            });
        });

        function number_format(number, decimals = 0) {
            const parts = number.toFixed(decimals).split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}




@endsection
