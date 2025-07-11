@extends('backend.sell.master')
@section('title', 'Add Product')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Add Product</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Prodect') }}" class="btn btn-primary"><i class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row card">

                        <div class="card-body p-4 row">
                            <form action="{{ route('add.books') }}" enctype="multipart/form-data" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Book Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Book Name" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="code" class="form-label">Book Code</label>
                                    <input type="number" class="form-control" id="code" name="code"
                                        placeholder="Book Code" required>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Price" class="form-label">Price(IQD)</label>
                                    <input type="number" class="form-control" id="Price" name="Price" required>
                                    @error('Price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="count" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="count" name="count" required>
                                    @error('count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image Book</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Image Book" required>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="date"
                                        name="date" required>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="add book" class="btn btn-primary px-4">Add
                                            Book</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





        @endsection
