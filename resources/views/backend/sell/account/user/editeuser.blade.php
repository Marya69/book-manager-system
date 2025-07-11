@extends('backend.sell.master')
@section('title', 'Update User')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Update User</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Users') }}" class="btn btn-primary"><i class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="col-md-6 ">
                    <div class="card ">

                        <div class="card-body p-4 row">
                            <form action="{{ route('update.user', $selecteduser->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $selecteduser->name }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $selecteduser->email }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select" required>
                                        <option value="Manager" {{ $selecteduser->role == 'Manager' ? 'selected' : '' }}>
                                            Manager</option>
                                        <option value="Accountant"
                                            {{ $selecteduser->role == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                                    </select>

                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="update user" class="btn btn-primary px-4">Update
                                            User</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="card ">

                        <div class="card-body p-4 row">
                            <form action="{{ route('update.password.user', $selecteduser->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label for="Current" class="form-label">Current Password</label>
                                    <input type="text" class="form-control" id="Current" name="Current"
                                        placeholder="Current Password" required>
                                    @error('Current')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="New Password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password-confirmation" class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" id="password-confirmation"
                                        name="password-confirmation" placeholder="Confirm Password" required>
                                    @error('password-confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="update user" class="btn btn-primary px-4">Update
                                            Password User</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-4 row">
                            <form action="{{ route('update.password.user', $selecteduser->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label for="Current" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="Current" name="Current"
                                        placeholder="Current Password" required>
                                    @error('Current')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="New Password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <hr />
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="frorm-lable">Name</label>
                            <input type="text" class="name" id="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="mb-3">
                            <label for="email" class="frorm-lable">Email</label>
                            <input type="text" class="email" id="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="mb-3">
                            <label for="password" class="frorm-lable">Password</label>
                            <input type="text" class="password" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>






                    </form>
                </div>
            </div>

        </div>
    </div> --}}



        @endsection
