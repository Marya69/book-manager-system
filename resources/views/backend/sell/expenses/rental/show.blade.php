@extends('backend.sell.master')
@section('title', 'Rental Expenses')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Rental Expenses</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Add.Rental') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Add
                            Rental Expenses
                        </a>

                    </div>
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
                                    <th>Month</th>
                                    <th>Price (IQD)</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentalexp as $key => $em)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $em->mangusal }}</td>
                                        <td>{{ number_format($em->price, 0) }} IQD</td>
                                        <td>{{ $em->date }}</td>



                                        <td>
                                            <a href="{{ route('edite.Rental', $em->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.Rental', $em->id) }}"
                                                id="delete"style="color: red"><i class='bx bxs-trash bx-sm'></i></a>

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
