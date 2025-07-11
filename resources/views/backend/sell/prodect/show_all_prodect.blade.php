@extends('backend.sell.master')
@section('title', 'Prodect')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Our products</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('add.book') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Add
                            New
                            product</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example"class="table table-striped table-bordered align-middle mb-0"
                            style="width:100%">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Book Name</th>
                                    <th>Book Code</th>
                                    <th>Sell Price</th>
                                    <th>Quantity</th>
                                    <th>Book Image</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodects as $key => $prodect)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $prodect->name }}</td>
                                        <td>{{ $prodect->code }}</td>
                                        <td>{{ number_format($prodect->price, 0) }} IQD</td>

                                        <td>{{ $prodect->count }}</td>
                                        <td><img src="{{ $prodect->image }}" class="product-img-2" alt="product img"></td>
                                        <td>{{ $prodect->date }}</td>
                                        <td>
                                            <a href="{{ route('edit.book', $prodect->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.book', $prodect->id) }}"
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
