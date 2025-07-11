@extends('backend.sell.master')
@section('title', 'Update Employee Expenses')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Update Employee expenses</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Employee.Expenses') }}" class="btn btn-primary"><i
                                class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row card">
                        <div class="card-body p-4 row">
                            <form action="{{ route('update.Employee', $emexpenses->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Employee</label>
                                    <select id="name" class="form-select" name="name" required>

                                        @foreach ($employess as $employee)
                                            <option value="{{ $employee->name }}"
                                                @if ($employee->id == $emexpenses->employee_id) selected @endif>{{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Subject" class="form-label">Subject</label>
                                    <input type="text" value="{{ $emexpenses->subject }}" class="form-control"
                                        id="Subject" name="Subject" placeholder="Subject" required>
                                    @error('Subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="salaryDisplay" class="col-md-6">
                                    <label for="price" class="form-label">Price (IQD)</label>
                                    <input type="number" value="{{ $emexpenses->money }}" id="price"
                                        class="form-control" name="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>






                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $emexpenses->date }}" required>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label for="tebene" class="form-label">Notice</label>
                                    <textarea class="form-control" id="tebene" name="tebene">{{ $emexpenses->tebene }}</textarea>

                                    @error('tebene')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>





                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="update expenses employee"
                                            class="btn btn-primary px-4">update
                                            Employee Expenses</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
