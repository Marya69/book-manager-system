@extends('backend.sell.master')
@section('title', 'Order')

@section('content')
@php
    date_default_timezone_set('Asia/Baghdad');
    $timeInBaghdad = date('d-m-Y H:i:s');
@endphp

<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 p-2">
            <div class="ps-3">
                <h6 class="mb-1 text-uppercase">Take Orders</h6>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <span>{{ $timeInBaghdad }}</span>
                </div>
            </div>
        </div>
        <hr>

        <!-- Cart Summary -->
        <div class="row p-2">
            <div class="col-lg-6">
                <div class="pricing-table">
                    <div class="col">
                        <div class="card mb-5 mb-lg-0 mx-auto">
                            <div class="card-body border-2">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th class="text-left">Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $cartItems = Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr class="text-center">
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <form method="post" action="{{ route('Cart.Update', $item->rowId) }}">
                                                        @csrf
                                                        <input type="number" name="qty" value="{{ $item->qty }}" style="width: 60px">
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-success btn-sm border-0 m-auto p-0">
                                                            <i class='bx bx-check'></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('Cart.Delete', $item->rowId) }}">
                                                        <i class='bx bxs-trash text-danger' style="font-size: 1.5rem"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @php
                                    $totalPrice = Cart::subtotal(0, '.', '');
                                @endphp

                                <form action="{{ route('create.invoice') }}" method="POST">
                                    @csrf
                                    @foreach ($cartItems as $item)
                                        <input type="hidden" name="codee[]" value="{{ $item->code }}">
                                        <input type="hidden" name="qty[]" value="{{ $item->qty }}">
                                        <input type="hidden" name="name[]" value="{{ $item->name }}">


                                    @endforeach

                              <input type="hidden" id="finalTotal" name="finalTotal" value="{{ $totalPrice }}">
<input type="hidden" name="total" value="{{ $totalPrice }}">
<input type="hidden" name="qutyall" value="{{ Cart::count() }}">
<input type="hidden" id="originalTotalHidden" value="{{ $totalPrice }}">

                                    <!-- Hidden input to store discount value -->
                                    <input type="hidden" id="discountValue" name="discountValue" value="0">

                                    <div class="py-3" style="background-color: #045cb3">
                                        <div class="card border-0 mb-4 text-white" style="background-color: transparent; border: none;">
    <div class="card-body border-0" style=" border: none;">

        <div class="row text-center">
            <div class="col-md-3 col-6 mb-2">
                <h6 >Quantity</h6>
                <p>{{ Cart::count() }}</p>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <h6 >Total Price</h6>
                <p><span id="originalTotal">{{ number_format($totalPrice, 0) }}</span> IQD</p>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <h6 >Discount</h6>
                <p><span id="discountAmount">0</span> IQD</p>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <h6 >Total After Discount</h6>
                <p><span id="totalAfterDiscount">{{ number_format($totalPrice, 0) }}</span> IQD</p>
            </div>
        </div>
    </div>
</div>

                                        {{-- <h6 class="text-white text-center">Quantity: {{ Cart::count() }}</h6>
                                        <h6 class="text-white text-center">Total Price: <span id="originalTotal">{{ number_format($totalPrice, 2) }}</span> IQD</h6>
                                        <h6 class="text-white text-center">Discount: <span id="discountAmount">0.00</span> IQD</h6>
                                        <h6 class="text-white text-center">Total After Discount: <span id="totalAfterDiscount">{{ number_format($totalPrice, 2) }}</span> IQD</h6> --}}
                                        <div class="d-flex justify-content-center m-3">
                                            <div class="btn-group-vertical">
                                                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalOne">
                                                    Discount
                                                </button>

                                            </div>
                                        </div>
                                            <!-- Discount Modal -->
                         </div>



                                  <div class="btn-group w-100" data-toggle="buttons">
  <label class="btn btn-danger active flex-grow-1" style="border-radius: 0;">
    <input type="radio" name="options" value="Sell" id="option1" checked> Sell
  </label>
  <label class="btn btn-danger flex-grow-1" style="border-radius: 0;">
    <input type="radio" name="options" value="Gift" id="option2"> Gift
  </label>
</div>

                                  <div class="d-flex justify-content-center">
  <button type="submit" class="btn my-3 radius-30 text-white" style="background-color: #045cb3">
    Create Invoice
  </button>
</div>

                                </form>
                            </div>
                        </div>
                    </div>

   <div class="modal fade" id="modalOne" tabindex="-1" aria-labelledby="modalOneLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalOneLabel">Apply Discount</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="discountForm">
                        <div class="mb-3">
                            <label for="discountInput" class="form-label">Discount Amount</label>
                            <input type="number" class="form-control" id="discountInput" name="discount" min="250" max="{{ $totalPrice }}" placeholder="Enter discount amount">
                            <div class="form-text">Enter a discount between 250 IQD and the total price.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="applyDiscount">Apply</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>

            <!-- Product List -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="table-responsive pt-2 py-2 m-1">
                        <div style="margin: 0 auto;">
                            <table id="example" class="table table-striped table-bordered mb-0" style="width:100%; margin: 0 auto;">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Book Name</th>
                                        <th>Book Code</th>
                                        <th>Book Image</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($prodects as $key => $prodect)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $prodect->name }}</td>
                                            <td>{{ $prodect->code }}</td>
                                            <td class="d-flex justify-content-center">
                                                <img src="../{{ $prodect->image }}" class="product-img-2 p-0 w-50 h-50" alt="product img">
                                            </td>
                                            <td>
                                                <form action="{{ route('Add.books') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $prodect->id }}">
                                                    <input type="hidden" name="code" value="{{ $prodect->code }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="name" value="{{ $prodect->name }}">
                                                    <input type="hidden" name="price" value="{{ $prodect->price }}">
                                                    <input type="hidden" name="sale_type" id="saleTypeHidden" value="Sell">
                                                    <button class="btn btn-sm p-0 border-0" style="background-color: #045cb3" type="submit">
                                                        <i class='bx bx-plus m-auto text-white' style="font-size: 1.5rem"></i>
                                                    </button>
                                                </form>
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
    </div>



    <!-- JavaScript to handle discount application -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const applyBtn         = document.getElementById('applyDiscount');
    const discountInput    = document.getElementById('discountInput');
    const discountField    = document.getElementById('discountValue');
    const finalTotalField  = document.getElementById('finalTotal');
    const displayDiscount  = document.getElementById('discountAmount');
    const displayNewTotal  = document.getElementById('totalAfterDiscount');
    const modalEl          = document.getElementById('modalOne');

    applyBtn.addEventListener('click', () => {
        const discountValue = parseFloat(discountInput.value);
        const totalPrice    = parseFloat(discountInput.max);
        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);

        if (isNaN(discountValue)) {
            return alert('Please enter a valid number for the discount.');
        }
        if (discountValue < 250) {
            return alert('Discount must be at least 250.');
        }
        if (discountValue > totalPrice) {
            return alert(`Discount cannot exceed the total price of ${totalPrice.toFixed(2)} IQD.`);
        }

        // ✅ Update form inputs
        const newTotal = (totalPrice - discountValue).toFixed(2);
        discountField.value = discountValue.toFixed(2);
        finalTotalField.value = newTotal;

        // ✅ Update display text
        displayDiscount.textContent = discountValue.toFixed(2);
        displayNewTotal.textContent = newTotal;

        // ✅ Close modal
        modalInstance.hide();
        modalInstance.dispose();
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const sellOption = document.getElementById('option1');
    const giftOption = document.getElementById('option2');
    const saleTypeHidden = document.getElementById('saleTypeHidden');

    sellOption.addEventListener('change', () => {
        if (sellOption.checked) saleTypeHidden.value = "Sell";
    });

    giftOption.addEventListener('change', () => {
        if (giftOption.checked) saleTypeHidden.value = "Gift";
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sellOption        = document.getElementById('option1');
    const giftOption        = document.getElementById('option2');
    const saleTypeHidden    = document.getElementById('saleTypeHidden');

    const originalTotal     = parseFloat(document.getElementById('originalTotalHidden').value);
    const originalTotalSpan = document.getElementById('originalTotal');
    const discountField     = document.getElementById('discountValue');
    const finalTotalField   = document.getElementById('finalTotal');
    const displayDiscount   = document.getElementById('discountAmount');
    const displayNewTotal   = document.getElementById('totalAfterDiscount');

    let currentDiscount = 0; // Store current discount if any

    function formatNumber(number) {
        return parseInt(number).toLocaleString('en-US');
    }

    // Apply Discount Button Logic
    const applyBtn = document.getElementById('applyDiscount');
    if (applyBtn) {
        applyBtn.addEventListener('click', () => {
            const discountInput = document.getElementById('discountInput');
            const discountValue = parseFloat(discountInput.value);
            const modalEl = document.getElementById('modalOne');
            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);

            if (isNaN(discountValue) || discountValue < 250 || discountValue > originalTotal) {
                return alert('Enter a valid discount between 250 and ' + formatNumber(originalTotal) + ' IQD.');
            }

            currentDiscount = discountValue;
            const newTotal = originalTotal - currentDiscount;

            // Update hidden fields
            discountField.value = currentDiscount.toFixed(2);
            finalTotalField.value = newTotal.toFixed(2);

            // Update visual display (formatted)
            displayDiscount.textContent = formatNumber(currentDiscount);
            displayNewTotal.textContent = formatNumber(newTotal);

            // Close the modal
            modalInstance.hide();
            modalInstance.dispose();
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });
    }

    // Gift Option Clicked
    giftOption.addEventListener('change', () => {
        if (giftOption.checked) {
            saleTypeHidden.value = "Gift";
            originalTotalSpan.textContent = "0";
            displayDiscount.textContent = "0";
            displayNewTotal.textContent = "0";
            discountField.value = 0;
            finalTotalField.value = 0;
        }
    });

    // Sell Option Clicked
    sellOption.addEventListener('change', () => {
        if (sellOption.checked) {
            saleTypeHidden.value = "Sell";
            const newTotal = originalTotal - currentDiscount;

            originalTotalSpan.textContent = formatNumber(originalTotal);
            displayDiscount.textContent   = formatNumber(currentDiscount);
            displayNewTotal.textContent   = formatNumber(newTotal);
            discountField.value           = currentDiscount.toFixed(2);
            finalTotalField.value         = newTotal.toFixed(2);
        }
    });
});
</script>


@endsection
