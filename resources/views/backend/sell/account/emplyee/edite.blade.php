@extends('backend.sell.master')
@section('title', 'Update Employee')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Update Employee</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Employee') }}" class="btn btn-primary"><i class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="row col-xl-6 mx-auto">
                    <div class="row card">

                        <div class="card-body p-4 row">
                            <form action="{{ route('update.employee', $selecteduser->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input value="{{ $selecteduser->name }}" type="text" class="form-control"
                                        id="name" name="name" placeholder="Full Name" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" value="{{ $selecteduser->phone }}" class="form-control"
                                        id="phone" name="phone" placeholder="phone" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Birthday" class="form-label">Date of Birth</label>
                                    <input type="date" value="{{ $selecteduser->borndate }}" class="form-control"
                                        id="Birthday" name="Birthday">
                                    @error('Birthday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Start_date" class="form-label">Start date of work</label>
                                    <input type="date" class="form-control" value="{{ $selecteduser->dateofwork }}"
                                        id="Start_date" name="Start_date" required>
                                    @error('Start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="salary" class="form-label">Salary(IQD)</label>
                                    <input type="number" class="form-control" id="salary"
                                        value="{{ $selecteduser->salary }}" name="salary" required>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="update Employee" class="btn btn-primary px-4">Update
                                            Employee</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





        @endsection
