<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\money as ModelsMoney;
use App\Models\muchdan;
use App\Models\orderdetail;
use App\Models\prodect;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class user_of_system extends Controller
{
    //
    public function sell()
    {
        $muchdan = muchdan::all();
        $employess = employee::all();
        $totaluser=user::all()->count();
        $totalemplyee=employee::all()->count();
        $totalprodect=prodect::all()->count();
        // $totalprodecnt=money::all()->count();
        $tqp = DB::table('orderdetails')
        ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
        ->where('orders.order_sell', 'Sell')
        ->sum('orderdetails.qty');
        $tqpg= DB::table('orderdetails')
        ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
        ->where('orders.order_sell', 'Gift')
        ->sum('orderdetails.qty');
        $moneysum = DB::table('money')->sum('price');

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $e1= DB::table('employeeexpenses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('money');



        //
        $e2= DB::table('courses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e3= DB::table('expenbooks')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e4= DB::table('reklams')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e5= DB::table('rentals')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e6= DB::table('technologies')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e7= DB::table('offices')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

        $e8= DB::table('balanses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e9= DB::table('learnings')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e10= DB::table('personals')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $e11= DB::table('peshangas')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;
        return view('backend.sell.dashboard', compact('employess', 'muchdan', 'totaluser', 'totalemplyee', 'totalprodect', 'tqp', 'tqpg','moneysum'))
        ->with([
            'e1' => $e1,
            'e2' => $e2 ,
            'e3' => $e3 ,
            'e4' => $e4 ,
            'e5' => $e5 ,
            'e6' => $e6 ,
            'e7' => $e7 ,
            'e8' => $e8 ,
            'e9' => $e9,
            'e10' => $e10 ,
            'e11' => $e11 ,
            'total'=>$total
        ]);

    }
    public function users()
    {
        $muchdan = muchdan::all();
        $employess = employee::all();
        $users = User::all();
        return view('backend.sell.account.user.user', compact('users', 'employess', 'muchdan'));
    }

    //adduser
    public function adduser()
    {
        $employess = employee::all();
        $muchdan = muchdan::all();
        return view('backend.sell.account.user.adduser', compact('employess', 'muchdan'));
    }
    public function adduserondatabase(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|[^@]+@[^@]+\.[a-zA-Z]{2,})$/', 'lowercase'], // Add 'email' validation rule
            'password' => ['required', 'min:8'], // Add 'min:8' or other password rules
            'role' => ['required']
        ]);

        // Check if the email already exists
        if (User::where('email', $request->email)->exists()) {
            // If the email already exists, redirect back with error message

            return redirect()->back()->withErrors(['email' => 'Email already exists for another user']);
        }

        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hashing the password
        $user->role = $request->role;
        $user->save();

        $notification = [
            'message' => 'New user added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Users')->with($notification);
    }

    public function editeuserondatabase($id)
    {
        $employess = employee::all();
        $muchdan = muchdan::all();
        $selecteduser = User::findOrFail($id);

        // Fetch the user without hashing the password
        $selecteduser->makeVisible('password');
        return view('backend.sell.account.user.editeuser', compact('selecteduser', 'employess', 'muchdan'));
    }


    public function updateuserondatabase(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|[^@]+@[^@]+\.[a-zA-Z]{2,})$/', 'lowercase'], // Add 'email' validation rule
            // Add 'min:8' or other password rules
            'role' => ['required']
        ]);

        // Find the user with the provided ID
        $user = User::findOrFail($id);

        // Check if the email is being updated to a new unique value
        if ($user->email != $request->email && User::where('email', $request->email)->exists()) {
            // If the email is not unique, redirect back with error message

            return redirect()->back()->withErrors(['email' => 'Email already exists for another user']);
        }

        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
        // Hashing the password
        $user->role = $request->role;
        $user->save();

        $notification = [
            'message' => 'Update successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('Users')->with($notification);
    }

    public function deleteuserondatabase($id)
    {

        try {
            $user = User::findOrFail($id);
            $user->delete();

            $notification = [
                'message' => 'User deleted successfully',
                'alert-type' => 'error',
            ];
        } catch (ModelNotFoundException $e) {
            // User not found
            $notification = [
                'message' => 'User not found',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('Users')->with($notification);
    }
    public function updateuserpasswordondatabase(Request $request, $id)
    {
        $request->validate([
            'Current' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Fetch the user by the provided ID
        $user = User::findOrFail($id);

        // Compare the provided current password with the hashed password stored in the database
        if (Hash::check($request->Current, $user->password)) {
            // If the current password is correct, update the password
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('user.logout');
        } else {
            // If the current password is incorrect, return with an error message
            return redirect()->back()->withErrors(['Current' => 'Your current password is incorrect, please try again ']);
        }
    }


    public function detail1(Request $request){


            $currentMonth = 1; // Hardcoded to January
            $currentYear = Carbon::now()->year;

            $e1 = DB::table('employeeexpenses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('money');

            $e2 = DB::table('courses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e3 = DB::table('expenbooks')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e4 = DB::table('reklams')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e5 = DB::table('rentals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e6 = DB::table('technologies')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e7 = DB::table('offices')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e8 = DB::table('balanses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e9 = DB::table('learnings')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e10 = DB::table('personals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e11 = DB::table('peshangas')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');
                $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

    if ($request->ajax()) {
        return response()->json([
            'e1' => $e1,
            'e2' => $e2,
            'e3' => $e3,
            'e4' => $e4,
            'e5' => $e5,
            'e6' => $e6,
            'e7' => $e7,
            'e8' => $e8,
            'e9' => $e9,
            'e10' => $e10,
            'e11' => $e11,
            'total'=>$total

        ]);
    }

    return redirect()->route('sell.dashboard')->with([
        'e1' => $e1,
        'e2' => $e2,
        'e3' => $e3,
        'e4' => $e4,
        'e5' => $e5,
        'e6' => $e6,
        'e7' => $e7,
        'e8' => $e8,
        'e9' => $e9,
        'e10' => $e10,
        'e11' => $e11,
        'total'=>$total
    ]);
        }




        // month2
        public function detail2(Request $request){


            $currentMonth = 2; // Hardcoded to January
            $currentYear = Carbon::now()->year;

            $e1 = DB::table('employeeexpenses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('money');

            $e2 = DB::table('courses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e3 = DB::table('expenbooks')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e4 = DB::table('reklams')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e5 = DB::table('rentals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e6 = DB::table('technologies')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e7 = DB::table('offices')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e8 = DB::table('balanses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e9 = DB::table('learnings')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e10 = DB::table('personals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e11 = DB::table('peshangas')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');
                $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

    if ($request->ajax()) {
        return response()->json([
            'e1' => $e1,
            'e2' => $e2,
            'e3' => $e3,
            'e4' => $e4,
            'e5' => $e5,
            'e6' => $e6,
            'e7' => $e7,
            'e8' => $e8,
            'e9' => $e9,
            'e10' => $e10,
            'e11' => $e11,
            'total'=>$total

        ]);
    }

    return redirect()->route('sell.dashboard')->with([
        'e1' => $e1,
        'e2' => $e2,
        'e3' => $e3,
        'e4' => $e4,
        'e5' => $e5,
        'e6' => $e6,
        'e7' => $e7,
        'e8' => $e8,
        'e9' => $e9,
        'e10' => $e10,
        'e11' => $e11,
        'total'=>$total
    ]);
        }




          // month3
          public function detail3(Request $request){


            $currentMonth = 3; // Hardcoded to January
            $currentYear = Carbon::now()->year;

            $e1 = DB::table('employeeexpenses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('money');

            $e2 = DB::table('courses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e3 = DB::table('expenbooks')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e4 = DB::table('reklams')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e5 = DB::table('rentals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e6 = DB::table('technologies')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e7 = DB::table('offices')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e8 = DB::table('balanses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e9 = DB::table('learnings')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e10 = DB::table('personals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e11 = DB::table('peshangas')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');
                $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

    if ($request->ajax()) {
        return response()->json([
            'e1' => $e1,
            'e2' => $e2,
            'e3' => $e3,
            'e4' => $e4,
            'e5' => $e5,
            'e6' => $e6,
            'e7' => $e7,
            'e8' => $e8,
            'e9' => $e9,
            'e10' => $e10,
            'e11' => $e11,
            'total'=>$total

        ]);
    }

    return redirect()->route('sell.dashboard')->with([
        'e1' => $e1,
        'e2' => $e2,
        'e3' => $e3,
        'e4' => $e4,
        'e5' => $e5,
        'e6' => $e6,
        'e7' => $e7,
        'e8' => $e8,
        'e9' => $e9,
        'e10' => $e10,
        'e11' => $e11,
        'total'=>$total
    ]);
        }
         // month3
         public function detail4(Request $request){


            $currentMonth = 4; // Hardcoded to January
            $currentYear = Carbon::now()->year;

            $e1 = DB::table('employeeexpenses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('money');

            $e2 = DB::table('courses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e3 = DB::table('expenbooks')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e4 = DB::table('reklams')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e5 = DB::table('rentals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e6 = DB::table('technologies')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e7 = DB::table('offices')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e8 = DB::table('balanses')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e9 = DB::table('learnings')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e10 = DB::table('personals')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');

            $e11 = DB::table('peshangas')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->sum('price');
                $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

    if ($request->ajax()) {
        return response()->json([
            'e1' => $e1,
            'e2' => $e2,
            'e3' => $e3,
            'e4' => $e4,
            'e5' => $e5,
            'e6' => $e6,
            'e7' => $e7,
            'e8' => $e8,
            'e9' => $e9,
            'e10' => $e10,
            'e11' => $e11,
            'total'=>$total

        ]);
    }

    return redirect()->route('sell.dashboard')->with([
        'e1' => $e1,
        'e2' => $e2,
        'e3' => $e3,
        'e4' => $e4,
        'e5' => $e5,
        'e6' => $e6,
        'e7' => $e7,
        'e8' => $e8,
        'e9' => $e9,
        'e10' => $e10,
        'e11' => $e11,
        'total'=>$total
    ]);
        } // month3
        public function detail5(Request $request){


          $currentMonth = 5; // Hardcoded to January
          $currentYear = Carbon::now()->year;

          $e1 = DB::table('employeeexpenses')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('money');

          $e2 = DB::table('courses')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e3 = DB::table('expenbooks')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e4 = DB::table('reklams')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e5 = DB::table('rentals')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e6 = DB::table('technologies')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e7 = DB::table('offices')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e8 = DB::table('balanses')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e9 = DB::table('learnings')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e10 = DB::table('personals')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');

          $e11 = DB::table('peshangas')
              ->whereYear('date', $currentYear)
              ->whereMonth('date', $currentMonth)
              ->sum('price');
              $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

  if ($request->ajax()) {
      return response()->json([
          'e1' => $e1,
          'e2' => $e2,
          'e3' => $e3,
          'e4' => $e4,
          'e5' => $e5,
          'e6' => $e6,
          'e7' => $e7,
          'e8' => $e8,
          'e9' => $e9,
          'e10' => $e10,
          'e11' => $e11,
          'total'=>$total

      ]);
  }

  return redirect()->route('sell.dashboard')->with([
      'e1' => $e1,
      'e2' => $e2,
      'e3' => $e3,
      'e4' => $e4,
      'e5' => $e5,
      'e6' => $e6,
      'e7' => $e7,
      'e8' => $e8,
      'e9' => $e9,
      'e10' => $e10,
      'e11' => $e11,
      'total'=>$total
  ]);
      } // month3
      public function detail6(Request $request){


        $currentMonth = 6; // Hardcoded to January
        $currentYear = Carbon::now()->year;

        $e1 = DB::table('employeeexpenses')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('money');

        $e2 = DB::table('courses')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e3 = DB::table('expenbooks')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e4 = DB::table('reklams')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e5 = DB::table('rentals')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e6 = DB::table('technologies')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e7 = DB::table('offices')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e8 = DB::table('balanses')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e9 = DB::table('learnings')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e10 = DB::table('personals')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');

        $e11 = DB::table('peshangas')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->sum('price');
            $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
    return response()->json([
        'e1' => $e1,
        'e2' => $e2,
        'e3' => $e3,
        'e4' => $e4,
        'e5' => $e5,
        'e6' => $e6,
        'e7' => $e7,
        'e8' => $e8,
        'e9' => $e9,
        'e10' => $e10,
        'e11' => $e11,
        'total'=>$total

    ]);
}

return redirect()->route('sell.dashboard')->with([
    'e1' => $e1,
    'e2' => $e2,
    'e3' => $e3,
    'e4' => $e4,
    'e5' => $e5,
    'e6' => $e6,
    'e7' => $e7,
    'e8' => $e8,
    'e9' => $e9,
    'e10' => $e10,
    'e11' => $e11,
    'total'=>$total
]);
    } // month3
    public function detail7(Request $request){


      $currentMonth = 7; // Hardcoded to January
      $currentYear = Carbon::now()->year;

      $e1 = DB::table('employeeexpenses')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('money');

      $e2 = DB::table('courses')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e3 = DB::table('expenbooks')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e4 = DB::table('reklams')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e5 = DB::table('rentals')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e6 = DB::table('technologies')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e7 = DB::table('offices')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e8 = DB::table('balanses')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e9 = DB::table('learnings')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e10 = DB::table('personals')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');

      $e11 = DB::table('peshangas')
          ->whereYear('date', $currentYear)
          ->whereMonth('date', $currentMonth)
          ->sum('price');
          $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
  return response()->json([
      'e1' => $e1,
      'e2' => $e2,
      'e3' => $e3,
      'e4' => $e4,
      'e5' => $e5,
      'e6' => $e6,
      'e7' => $e7,
      'e8' => $e8,
      'e9' => $e9,
      'e10' => $e10,
      'e11' => $e11,
      'total'=>$total

  ]);
}

return redirect()->route('sell.dashboard')->with([
  'e1' => $e1,
  'e2' => $e2,
  'e3' => $e3,
  'e4' => $e4,
  'e5' => $e5,
  'e6' => $e6,
  'e7' => $e7,
  'e8' => $e8,
  'e9' => $e9,
  'e10' => $e10,
  'e11' => $e11,
  'total'=>$total
]);
  } // month3
  public function detail8(Request $request){


    $currentMonth = 8; // Hardcoded to January
    $currentYear = Carbon::now()->year;

    $e1 = DB::table('employeeexpenses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('money');

    $e2 = DB::table('courses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e3 = DB::table('expenbooks')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e4 = DB::table('reklams')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e5 = DB::table('rentals')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e6 = DB::table('technologies')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e7 = DB::table('offices')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e8 = DB::table('balanses')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e9 = DB::table('learnings')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e10 = DB::table('personals')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');

    $e11 = DB::table('peshangas')
        ->whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->sum('price');
        $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
return response()->json([
    'e1' => $e1,
    'e2' => $e2,
    'e3' => $e3,
    'e4' => $e4,
    'e5' => $e5,
    'e6' => $e6,
    'e7' => $e7,
    'e8' => $e8,
    'e9' => $e9,
    'e10' => $e10,
    'e11' => $e11,
    'total'=>$total

]);
}

return redirect()->route('sell.dashboard')->with([
'e1' => $e1,
'e2' => $e2,
'e3' => $e3,
'e4' => $e4,
'e5' => $e5,
'e6' => $e6,
'e7' => $e7,
'e8' => $e8,
'e9' => $e9,
'e10' => $e10,
'e11' => $e11,
'total'=>$total
]);
} // month3
public function detail9(Request $request){


  $currentMonth = 9; // Hardcoded to January
  $currentYear = Carbon::now()->year;

  $e1 = DB::table('employeeexpenses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('money');

  $e2 = DB::table('courses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e3 = DB::table('expenbooks')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e4 = DB::table('reklams')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e5 = DB::table('rentals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e6 = DB::table('technologies')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e7 = DB::table('offices')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e8 = DB::table('balanses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e9 = DB::table('learnings')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e10 = DB::table('personals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e11 = DB::table('peshangas')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');
      $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
return response()->json([
  'e1' => $e1,
  'e2' => $e2,
  'e3' => $e3,
  'e4' => $e4,
  'e5' => $e5,
  'e6' => $e6,
  'e7' => $e7,
  'e8' => $e8,
  'e9' => $e9,
  'e10' => $e10,
  'e11' => $e11,
  'total'=>$total

]);
}

return redirect()->route('sell.dashboard')->with([
'e1' => $e1,
'e2' => $e2,
'e3' => $e3,
'e4' => $e4,
'e5' => $e5,
'e6' => $e6,
'e7' => $e7,
'e8' => $e8,
'e9' => $e9,
'e10' => $e10,
'e11' => $e11,
'total'=>$total
]);
} // month3
public function detail10(Request $request){


  $currentMonth = 10; // Hardcoded to January
  $currentYear = Carbon::now()->year;

  $e1 = DB::table('employeeexpenses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('money');

  $e2 = DB::table('courses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e3 = DB::table('expenbooks')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e4 = DB::table('reklams')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e5 = DB::table('rentals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e6 = DB::table('technologies')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e7 = DB::table('offices')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e8 = DB::table('balanses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e9 = DB::table('learnings')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e10 = DB::table('personals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e11 = DB::table('peshangas')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');
      $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
return response()->json([
  'e1' => $e1,
  'e2' => $e2,
  'e3' => $e3,
  'e4' => $e4,
  'e5' => $e5,
  'e6' => $e6,
  'e7' => $e7,
  'e8' => $e8,
  'e9' => $e9,
  'e10' => $e10,
  'e11' => $e11,
  'total'=>$total

]);
}

return redirect()->route('sell.dashboard')->with([
'e1' => $e1,
'e2' => $e2,
'e3' => $e3,
'e4' => $e4,
'e5' => $e5,
'e6' => $e6,
'e7' => $e7,
'e8' => $e8,
'e9' => $e9,
'e10' => $e10,
'e11' => $e11,
'total'=>$total
]);
} // month3
public function detail11(Request $request){


  $currentMonth = 11; // Hardcoded to January
  $currentYear = Carbon::now()->year;

  $e1 = DB::table('employeeexpenses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('money');

  $e2 = DB::table('courses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e3 = DB::table('expenbooks')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e4 = DB::table('reklams')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e5 = DB::table('rentals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e6 = DB::table('technologies')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e7 = DB::table('offices')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e8 = DB::table('balanses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e9 = DB::table('learnings')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e10 = DB::table('personals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e11 = DB::table('peshangas')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');
      $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
return response()->json([
  'e1' => $e1,
  'e2' => $e2,
  'e3' => $e3,
  'e4' => $e4,
  'e5' => $e5,
  'e6' => $e6,
  'e7' => $e7,
  'e8' => $e8,
  'e9' => $e9,
  'e10' => $e10,
  'e11' => $e11,
  'total'=>$total

]);
}

return redirect()->route('sell.dashboard')->with([
'e1' => $e1,
'e2' => $e2,
'e3' => $e3,
'e4' => $e4,
'e5' => $e5,
'e6' => $e6,
'e7' => $e7,
'e8' => $e8,
'e9' => $e9,
'e10' => $e10,
'e11' => $e11,
'total'=>$total
]);
} // month3
public function detail12(Request $request){


  $currentMonth = 12; // Hardcoded to January
  $currentYear = Carbon::now()->year;

  $e1 = DB::table('employeeexpenses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('money');

  $e2 = DB::table('courses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e3 = DB::table('expenbooks')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e4 = DB::table('reklams')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e5 = DB::table('rentals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e6 = DB::table('technologies')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e7 = DB::table('offices')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e8 = DB::table('balanses')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e9 = DB::table('learnings')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e10 = DB::table('personals')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');

  $e11 = DB::table('peshangas')
      ->whereYear('date', $currentYear)
      ->whereMonth('date', $currentMonth)
      ->sum('price');
      $total = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11;

if ($request->ajax()) {
return response()->json([
  'e1' => $e1,
  'e2' => $e2,
  'e3' => $e3,
  'e4' => $e4,
  'e5' => $e5,
  'e6' => $e6,
  'e7' => $e7,
  'e8' => $e8,
  'e9' => $e9,
  'e10' => $e10,
  'e11' => $e11,
  'total'=>$total

]);
}

return redirect()->route('sell.dashboard')->with([
'e1' => $e1,
'e2' => $e2,
'e3' => $e3,
'e4' => $e4,
'e5' => $e5,
'e6' => $e6,
'e7' => $e7,
'e8' => $e8,
'e9' => $e9,
'e10' => $e10,
'e11' => $e11,
'total'=>$total
]);
}

public function checkProductQuantities()
{
    // Fetch products with zero quantity
    $products = prodect::where('count', 0)->get();
    if($products){
        return view('backend.sell.layout.header', compact('products'));
    }

    // return view('backend.sell.layout.header', compact('products'));
}
}
