@extends('backend.sell.master')
@section('title', 'Earnings of money')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Earnings of money</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Add.Page.Money') }}" class="btn btn-success"><i class="bx bx-list-plus pb-1"></i>Add
                            money </a>

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
                                    <th>Subject</th>
                                    <th>Money(IQD)</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Notice</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($money as $key => $m)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $m->subject }}</td>
                                        <td>{{ number_format($m->price, 0) }} IQD</td>
                                        <td>{{ $m->date1 }}</td>
                                        <td>{{ $m->date2 }}</td>
                                        <td>{{ $m->tebeni }}</td>

                                        <td>
                                            <a href="{{ route('edite.Page.Money', $m->id) }}" style="color: green"><i
                                                    class='bx bx-edit-alt bx-sm'></i></a>
                                            <a href="{{ route('delete.Page.Money', $m->id) }}"
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
