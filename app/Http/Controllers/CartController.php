<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\muchdan;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\prodect;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCollection;
use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function addprodect(Request $request){
// Initialize a variable to hold the total quantity in the cart
$totalQtyInCart = 0;

// Get all items in the cart
$cartItems = $this->cart->content();

// Iterate over each item in the cart to sum up the quantities
foreach ($cartItems as $item) {
    $totalQtyInCart += $item->qty;
}

// Retrieve the product by its ID
$product = prodect::find($request->id);

// Check if the product exists and if its count is sufficient
if ($product && $product->count >= $totalQtyInCart + $request->qty) {
    // If the product exists and its count is sufficient, add it to the cart
    $itemDetails = [
        'id' => $request->id,
        'qty' => $request->qty,
        'name' => $request->name,
        'price' => $request->price,

    ];

    $identifier = $request->id;

    $cartItem = $this->cart->add($itemDetails, $identifier);

    if ($cartItem) {
        $notification = [
            'message' => 'The Product was added successfully',
            'alert-type' => 'success',
        ];
    } else {
        $notification = [
            'message' => 'Something went wrong',
            'alert-type' => 'error',
        ];
    }
} else {
    // If the product doesn't exist or the total requested count exceeds the available count, show an error
    $notification = [
        'message' => ' the total requested count is not available',
        'alert-type' => 'error',
    ];
}

return redirect()->route('pos')->with($notification);


    }

public function updatedq(Request $request, $rowId){

  // Assuming your CartItem model has a relationship to the Product model
  $cartItems = $this->cart->content();

if (!$cartItems) {
    // Cart item not found, handle this scenario (e.g., show an error message)
    $notification = [
        'message' => 'Cart item not found',
        'alert-type' => 'error',
    ];

    return redirect()->route('pos')->with($notification);
}

foreach ($cartItems as $item) {
    $product = prodect::find($request->id);
    // dd($request->id);
if ($product->count >= $request->qty) {
    // Sufficient stock available, update the cart
    $itemDetails = [
        'qty' => $request->qty,
    ];

    $updatedCartItem = $this->cart->update($rowId, $itemDetails);

    if ($updatedCartItem) {
        $notification = [
            'message' => 'The Product was updated successfully',
            'alert-type' => 'success',
        ];
    } else {
        $notification = [
            'message' => 'Something went wrong',
            'alert-type' => 'error',
        ];
    }

    return redirect()->route('pos')->with($notification);
} else {
    // Insufficient stock, handle this scenario
    $notification = [
        'message' => 'Insufficient stock available',
        'alert-type' => 'error',
    ];

    return redirect()->route('pos')->with($notification);
}

}

}
public function deltedeq($rowId){
    try {
        $cartItem = $this->cart->remove($rowId);

        if ($cartItem && $rowId) {
            $notification = [
                'message' => 'Something went wrong',
                'alert-type' => 'info',
            ];
        } else {
            $notification = [
                'message' => 'The Product was deleted successfully',
                'alert-type' => 'error',
            ];
        }
    } catch (\Exception $e) {
        // Handle the exception here
        $notification = [
            'message' => 'An error occurred: ',
            'alert-type' => 'error',
        ];
    }

    return redirect()->route('pos')->with($notification);

}

public function alladd()
{
        $cartItems = $this->cart->content();
        $products = prodect::all(); // Corrected 'prodect' to 'Product'
        $notification = [];

        foreach ($products as $product) {
            // Find the corresponding cart item by product ID
            $cartItem = $cartItems->where('id', $product->id)->first(); // Use collection method 'where'

            // Check if the cart item exists and if its quantity exceeds the available count
            if ($cartItem && $product->count >= $cartItem->qty) {
                // If the cart item quantity exceeds the available count, show an error
                $notification = [
                    'message' => 'One of the Product has insufficient stock',
                    'alert-type' => 'error',
                ];
                return redirect()->route('pos')->with($notification);
            }

            // If the product count is sufficient, add it to the cart
            $itemDetails = [
                'id' => $product->id,
                'code' => $product->id,
                'qty' => 1,
                'name' => $product->name,
                'price' => $product->price,
            ];

            $cartItem = $this->cart->add($itemDetails);

            // Check if the cart item was added successfully
            if (!$cartItem) {
                $notification = [
                    'message' => 'Something went wrong',
                    'alert-type' => 'error',
                ];
                return redirect()->route('pos')->with($notification);
            }
        }

        // If all items are added successfully, set a success notification
        $notification = [
            'message' => 'All products added to the cart successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('pos')->with($notification);


//     $cartItems = $this->cart->content();
//     $products = prodect::all();
//     $notification = [];

//     foreach ($products as $product) {
//         // Find the corresponding cart item by product ID
//         $cartItem = $this->cart->get($product->id);

//         // Check if the cart item exists and if its quantity exceeds the available count
//         if ($cartItem && $product->count < $cartItem->qty) {
//             // If the cart item quantity exceeds the available count, show an error
//             $notification = [
//                 'message' => 'Product ' . $product->name . ' has insufficient stock',
//                 'alert-type' => 'error',
//             ];
//             return redirect()->route('pos')->with($notification);
//         }

//         // If the product count is sufficient, add it to the cart
//         $itemDetails = [
//             'id' => $product->id,
//             'code' => $product->id,
//             'qty' => 1,
//             'name' => $product->name,
//             'price' => $product->price,
//         ];

//         $cartItem = $this->cart->add($itemDetails);

//         // Check if the cart item was added successfully
//         if (!$cartItem) {
//             $notification = [
//                 'message' => 'Something went wrong',
//                 'alert-type' => 'error',
//             ];
//             return redirect()->route('pos')->with($notification);
//         }
//     }

//     // If all products were added successfully
//     $notification = [
//         'message' => 'All products were added successfully',
//         'alert-type' => 'success',
//     ];
//     return redirect()->route('pos')->with($notification);

}

public function addinvoice(Request $request)
{
    $cartItems = $this->cart->content();

    // Check if the cart is empty
    if ($cartItems->isEmpty()) {
        $notification = [
            'message' => "Your cart is empty. Please add items to proceed.",
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    }

    $muchdan = Muchdan::all();
    $employess = Employee::all();

    $data = [
        'name_seller' => Auth::user()->name,
        'order_date' => date('Y-m-d'),
        'order_sell'=> $request->options

    ];

    $order_id = DB::table('orders')->insertGetId($data);
    $notification = '';

    foreach ($cartItems as $item) {
        $product = prodect::find($item->id);

        // Check if product exists and has sufficient quantity
        if ($product && $product->count >= 1) {

            $orderDetail = [
                'prodect_id' => $item->id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'order_id' => $order_id,


            ];

            // Insert order detail
            $insertedOrderDetail = DB::table('orderdetails')->insertGetId($orderDetail);

            // Decrement product quantity
            $product->count -= $item->qty;
            $product->save();
        } else {
            // Notify if product doesn't exist or has insufficient quantity

            // Exit the loop immediately if any product doesn't meet requirements
            $notification = [
                'message' => "You don't have enough quantity to sell.",
                'alert-type' => 'error',
            ];
            break;
        }
    }


    $discount  = $request->input('discountValue');
    $finalTotal= $request->input('finalTotal');
    $total  = $request->input('total');
    $qutyall= $request->input('qutyall');
    // Destroy cart if all items are successfully added to order
    if (empty($notification)) {
        $this->cart->destroy();
    } else {
        // Redirect back with the notification message
        return redirect()->back()->with($notification);
    }


    return view('backend.sell.pos.invoice', compact('qutyall','total','discount','finalTotal','cartItems', 'muchdan', 'employess','order_id'));
}
public function getZeroQuantityCount()
{
    $zeroCount = prodect::where('count', 0)->count();
    return response()->json(['count' => $zeroCount]);
}

 public function getProductNotifications()
    {
        $products = prodect::where('count', 0)
                    ->latest()
                    ->get(['name', 'image']);

        return response()->json($products);
    }



}
