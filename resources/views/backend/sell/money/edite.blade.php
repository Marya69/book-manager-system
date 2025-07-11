@extends('backend.sell.master')
@section('title', 'Update Earnings of money')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Update Earnings of money</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Page.Money') }}" class="btn btn-primary"><i
                                class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="row col-xl-6 mx-auto">
                    <div class="row card">

                        <div class="card-body p-4 row">
                            <form action="{{ route('update.Page.Money', $money->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="Subject" class="form-label">Subject</label>
                                    <input type="text" value="{{ $money->subject }}" class="form-control" id="Subject"
                                        name="Subject" placeholder="Subject" required>
                                    @error('Subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="salaryDisplay" class="col-md-6">
                                    <label for="price" class="form-label">Money(IQD)</label>
                                    <input type="number" value="{{ $money->price }}" id="price" class="form-control"
                                        name="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="date" class="form-label">From</label>
                                    <input type="date" value="{{ $money->date1 }}" class="form-control" id="date"
                                        name="date" value="{{ date('Y-m-d') }}" required>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date1" class="form-label">To</label>
                                    <input type="date" value="{{ $money->date2 }}" class="form-control" id="date1"
                                        name="date1" value="{{ date('Y-m-d') }}" required>
                                    @error('date1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="tebene" class="form-label">Notice</label>
                                    <textarea class="form-control" id="tebene" name="tebene">{{ $money->tebeni }}</textarea>

                                    @error('tebene')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>






                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="update Earnings of money"
                                            class="btn btn-primary px-4">Update
                                            Earnings of money</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





        @endsection
