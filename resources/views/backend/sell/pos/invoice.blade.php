@extends('backend.sell.master')
@section('title', 'Invoice')
@section('content')


    {{-- <h4>Discount Applied: {{ number_format($discount, 2) }} IQD</h4>
<h4>Total After Discount: {{ number_format($finalTotal, 2) }} IQD</h4> --}}
    @php

        // Set the default timezone to UTC
        date_default_timezone_set('UTC');

        // Get the time (assuming it's in UTC)
$timeInUTC = strtotime('15:28:22');

// Set the timezone to Baghdad
date_default_timezone_set('Asia/Baghdad');

// Convert UTC time to Baghdad time
$timeInBaghdad = date('d/m/Y ', $timeInUTC);

        // Output the time in Baghdad timezone
        //

    @endphp
    <div class="page-wrapper">

        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="mr-0">
                    <button type="button" onclick="printMainContent();" class="btn btn-dark">
                        <i class='bx bxs-printer'></i> Print
                    </button>

                    <button type="button" class="btn btn-primary" onclick="window.location.replace('{{ route('pos') }}')">
                        Back
                    </button>

                    {{-- <a href="{{ route('back') }}" class="btn btn-primary">Back</a> --}}

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div id="invoice">
                        <div class="toolbar hidden-print">

                            <hr />
                        </div>
                        <div class="invoice overflow-auto">
                            <div style="min-width: 600px">

                                <main id="print-area">
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <div class="text-gray-light">INVOICE TO:</div>
                                            <h2 class="to">BookShop</h2>

                                        </div>
                                        <div class="col invoice-details">
                                            <h1 class="invoice-id"></h1>
                                            <div class="date">Date of Invoice : @php
                                                echo $timeInBaghdad;
                                            @endphp </div>

                                            <div class="date">Order Id: {{ $order_id }} </div>


                                            <div class="date">vendor: {{ Auth::user()->name }}</div>
                                        </div>
                                    </div>
                                    <table class="table border-4">
                                        <thead>
                                            <tr>
                                                <th class="no">#</th>
                                                <th class="text-center no">Book Name</th>
                                                {{-- <th class="text-right">name</th> --}}
                                                <th class="text-center no ">Quantity</th>
                                                <th class="text-center no ">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sel = 1;
                                            @endphp
                                            @foreach ($cartItems as $pp)
                                                <tr>
                                                    <td class="no">
                                                        {{ $sel++ }}
                                                    </td>


                                                    <td class="text-center ">{{ $pp->name }}</td>
                                                    <td class="text-center ">{{ $pp->qty }}</td>
                                                    <td class="text-center ">
                                                        {{ number_format($pp->price * $pp->qty, 0) }}IQD
                                                    </td>
                                                    {{-- <td class="total">{{ $pp->qty }}</td> --}}
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    {{-- <div class="thanks">Thank you!</div> --}}
                                    <div class="notices pt-2">

                                        <div>All BOOKS: {{ $qutyall }}</div>
                                        <h5>Total cost : {{ number_format($total, 0) }} IQD</h5>
                                        @if ($discount > 0)
                                            <h6>Discount Applied: {{ number_format($discount, 0) }} IQD</h6>
                                        @endif

                                        <h5>Total : {{ number_format($finalTotal, 0) }} IQD</h5>

                                </main>

                            </div>

                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        function printMainContent() {
            const printContents = document.getElementById('print-area').innerHTML;
            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(`
            <html>
                <head>
                    <title>Invoice</title>

                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 10px;
                        }
                            .notices{
                            padding-top:15px;
                            }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                             margin-top:13px;
                        }
                        table, th, td {
                            border: 1px solid #000;
                            // padding:0px;
                        }
                        th, td {
                            padding: 10px;
                            text-align: center;
                        }.invoice-to{
                             padding-top:30px;
                        }

                    </style>
                </head>
                <body>
                    ${printContents}
                </body>
            </html>
        `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>




@endsection
