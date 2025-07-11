<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\money as ModelsMoney;
use App\Models\muchdan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class money extends Controller
{
    //


    public function Moneyshow(){
        $muchdan = muchdan::all();
        $employess = employee::all();
        $money= ModelsMoney::all();
        return view('backend.sell.money.show', compact('employess', 'muchdan','money'));
    }
    public function Moneyshowadd(){
        $muchdan = muchdan::all();
        $employess = employee::all();

        return view('backend.sell.money.add', compact('employess', 'muchdan'));
    }

    public function Moneystore(Request $request){
        $request->validate([
            'Subject' => ['required', 'string'],
            'price' => ['required', 'numeric','min:0'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'date1' => ['required', 'date', 'date_format:Y-m-d'],
            'tebene'=> ['string','nullable'],

        ]);

        $pes =new ModelsMoney();
        $pes->subject = $request->Subject;
        $pes->price  = $request->price;
        $pes->date1  = $request->date;
        $pes->date2  = $request->date1;
        $pes->tebeni = $request->tebene;

        // Save the new employee
        $pes->save();

        $notification = [
            'message' => 'New Earnings of money added successfully ',
            'alert-type' => 'success',
        ];

        return redirect()->route('Page.Money')->with($notification);

    }public function Moneyedite($id){
        $muchdan = muchdan::all();
        $employess = employee::all();
        $money= ModelsMoney::findOrFail($id);
        return view('backend.sell.money.edite', compact('employess', 'muchdan','money'));
    }public function Moneyeupdate(Request $request,$id){
        $request->validate([
            'Subject' => ['required', 'string'],
            'price' => ['required', 'numeric','min:0'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'date1' => ['required', 'date', 'date_format:Y-m-d'],
            'tebene'=> ['string','nullable'],

        ]);

        $pes =ModelsMoney::findOrFail($id);
        $pes->subject = $request->Subject;
        $pes->price  = $request->price;
        $pes->date1  = $request->date;
        $pes->date2  = $request->date1;
        $pes->tebeni = $request->tebene;

        // Save the new employee
        $pes->save();

        $notification = [
            'message' => 'This Earnings of money updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Page.Money')->with($notification);
    }

    public function Moneyedelete($id){
        try {
            $re =ModelsMoney::findOrFail($id);
            $re->delete();

            $notification = [
                'message' => 'This Earnings of money deleted successfully',
                'alert-type' => 'error',
            ];
        } catch (ModelNotFoundException $e) {
            // User not found
            $notification = [
                'message' => 'This Earnings of money not found',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('Page.Money')->with($notification);

    }
}
