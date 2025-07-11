@extends('backend.sell.master')
@section('title', 'User Page')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">All Users</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('adduser') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Add New
                            User</a>

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
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>{{ $user->password }}</td> --}}
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('edite.user', $user->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.user', $user->id) }}" id="delete"
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
