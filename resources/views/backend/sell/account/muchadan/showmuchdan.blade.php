@extends('backend.sell.master')
@section('title', 'Pay the salary')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Payment of employees</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('add.mucha') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Payment
                            of salaries</a>

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
                                    <th>Name Employee</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                    <th>The person who paid the salary</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($muchdan as $key => $muchdans)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $muchdans->name }}</td>
                                        <td>{{ $muchdans->mang }}</td>
                                        <td>{{ $muchdans->year }}</td>
                                        <td>{{ $muchdans->date }}</td>
                                        <td>{{ number_format($muchdans->salary + $muchdans->reward, 0) }} IQD</td>

                                        <td>{{ $muchdans->thatuser_get_salary }}</td>
                                        <td>
                                            <a href="{{ route('edite.muchadan', $muchdans->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.mucha', $muchdans->id) }}" id="delete"
                                                style="color: red"><i class='bx bxs-trash bx-sm'></i></a>

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
