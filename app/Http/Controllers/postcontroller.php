<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\muchdan;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\prodect;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnSelf;

class postcontroller extends Controller
{
    //
public function showing(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    // $prodects = prodect::orderBy('id', 'desc')->get();


    return view('backend.sell.dashboard', compact('muchdan','employess'));
}
    public function show(){
        $muchdan = muchdan::all();
        $employess = employee::all();
        $prodects = prodect::orderBy('id', 'desc')
                       ->where('count', '>=', 1)
                       ->get();


        return view('backend.sell.pos.show', compact('prodects','muchdan','employess'));
    }

    public function allsold(){
        $muchdan = muchdan::all();
        $employess = employee::all();
        //  $orders=order::orderBy('id', 'desc')->get();\
        $orders = Order::where('order_sell', 'Sell')->orderBy('id', 'desc')->get();
        $order=Array();
        return view('backend.sell.sold.sold', compact('muchdan','employess','orders','order'));

    }
    // public function viewOrder($id) {
    //     $muchdan = muchdan::all();
    //     $employess = employee::all();
    //      $orders=order::orderBy('id', 'desc')->get();

    //     $orderDetails = OrderDetail::where('order_id', $id)->get();
    //     return back()->with(compact('muchdan', 'employess', 'orders', 'orderDetails'));



    // }

    public function viewOrder($id)
{

    $order = OrderDetail::where('order_id', $id)->get();
    // dd($order);
    return response()->json($order);

}
public function undo($id) {
    // Find the order by ID
    $order = Order::findOrFail($id);

    // Initialize an array to store product IDs
    $productIds = [];

    // Loop through each order detail associated with the order
    foreach ($order->orderDetails as $orderDetail) {
        // Get the product ID of each order detail and add it to the array
        $productIds[] = $orderDetail->prodect_id;
    }
    // dd($productIds);
    // Now $productIds array contains all product IDs associated with the order

    // Find all products where the ID is in the $productIds array
    $products = prodect::whereIn('id', $productIds)->get();

    // Now $products contains all products associated with the order details of the specific order

    // Check if products are found
    if ($products->isNotEmpty()) {

        // Loop through each product
        foreach ($products as $product) {
            // Initialize total quantity for the product
            $totalQuantity = 0;

            // Loop through order details associated with the product
            foreach ($order->orderDetails as $orderDetail) {
                if ($orderDetail->prodect_id === $product->id) {
                    $totalQuantity += $orderDetail->qty;
                }
            }

            // Update product count with the total quantity
            $product->count += $totalQuantity;
            $product->save();
        }


        // Delete the order details
        $order->orderDetails()->delete();

        // Delete the order
        $order->delete();
        $notification = [
            'message' => ' successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.Sold')->with($notification);
    } else {
        $notification = [
            'message' => 'error',
            'alert-type' => 'error',
        ];

        return redirect()->route('all.Sold')->with($notification);
    }
}

// all gift
public function allsoldgift(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    //  $orders=order::orderBy('id', 'desc')->get();\
    $orders = Order::where('order_sell', 'Gift')->orderBy('id', 'desc')->get();
    $order=Array();
    return view('backend.sell.sold.gift', compact('muchdan','employess','orders','order'));
}
  public function viewOrdergift($id)
{

    $order = OrderDetail::where('order_id', $id)->get();
    // dd($order);
    return response()->json($order);

}public function undogift($id) {
    // Find the order by ID
    $order = Order::findOrFail($id);

    // Initialize an array to store product IDs
    $productIds = [];

    // Loop through each order detail associated with the order
    foreach ($order->orderDetails as $orderDetail) {
        // Get the product ID of each order detail and add it to the array
        $productIds[] = $orderDetail->prodect_id;
    }
    // dd($productIds);
    // Now $productIds array contains all product IDs associated with the order

    // Find all products where the ID is in the $productIds array
    $products = prodect::whereIn('id', $productIds)->get();

    // Now $products contains all products associated with the order details of the specific order

    // Check if products are found
    if ($products->isNotEmpty()) {

        // Loop through each product
        foreach ($products as $product) {
            // Initialize total quantity for the product
            $totalQuantity = 0;

            // Loop through order details associated with the product
            foreach ($order->orderDetails as $orderDetail) {
                if ($orderDetail->prodect_id === $product->id) {
                    $totalQuantity += $orderDetail->qty;
                }
            }

            // Update product count with the total quantity
            $product->count += $totalQuantity;
            $product->save();
        }


        // Delete the order details
        $order->orderDetails()->delete();

        // Delete the order
        $order->delete();
        $notification = [
            'message' => ' successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.Sold.gift')->with($notification);
    } else {
        $notification = [
            'message' => 'error',
            'alert-type' => 'error',
        ];

        return redirect()->route('all.Sold.gift')->with($notification);
    }
}
public function back(){
    return redirect()->route('pos');
}

}