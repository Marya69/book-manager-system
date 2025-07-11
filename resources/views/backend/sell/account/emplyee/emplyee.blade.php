@extends('backend.sell.master')
@section('title', 'Employee')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">All Employees</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('addemployee') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Add
                            New
                            Employee</a>

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
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Birthday</th>
                                    <th>Start date of work</th>
                                    <th>Salary</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employess as $key => $employe)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $employe->name }}</td>
                                        <td>{{ $employe->phone }}</td>
                                        <td>{{ $employe->borndate }}</td>
                                        <td>{{ $employe->dateofwork }}</td>
                                        <td>{{ number_format($employe->salary, 0) }} IQD</td>

                                        <td>
                                            <a href="{{ route('edite.employee', $employe->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.employee', $employe->id) }}"
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
