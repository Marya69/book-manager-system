@extends('backend.sell.master')
@section('title', 'Update Rental Expenses')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Update Rental Expenses</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Rental.Expenses') }}" class="btn btn-primary"><i
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
                            <form action="{{ route('update.Rental', $ren->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="Month" class="form-label">Month</label>
                                    <input type="month" class="form-control" id="Month" name="Month"
                                        value="{{ $ren->mangusal }}" required>
                                    @error('Month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div id="salaryDisplay" class="col-md-6">
                                    <label for="price" class="form-label">Price (IQD)</label>
                                    <input type="number" value="{{ $ren->price }}" id="price" class="form-control"
                                        name="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>






                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $ren->date }}" required>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>








                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="Update Rental Expenses"
                                            class="btn btn-primary px-4">Update
                                            Rental Expenses</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
