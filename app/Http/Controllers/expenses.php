<?php

namespace App\Http\Controllers;

use App\Models\balanse;
use App\Models\course;
use App\Models\employee;
use App\Models\employeeexpenses;
use App\Models\expenbook;
use App\Models\learning;
use App\Models\muchdan;
use App\Models\office;
use App\Models\personal;
use App\Models\peshanga;
use App\Models\reklam;
use App\Models\rental;
use App\Models\technology;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class expenses extends Controller
{
    //start employee expenses
    public function emexpensesshow(){
        $muchdan = muchdan::all();
        $employess = employee::all();
        $emexpenses = employeeexpenses::all();
        return view('backend.sell.expenses.employee.show', compact('emexpenses','muchdan','employess'));
    }public function emexpensesadd(){

        $muchdan = muchdan::all();
        $employess = employee::all();
        $emexpenses = employeeexpenses::all();
        return view('backend.sell.expenses.employee.add', compact('emexpenses','muchdan','employess'));
    }

   public function emexpensestore(Request $request){

    $request->validate([
        'name' => ['required', 'string'],
        'Subject' => ['required','string'],
        'tebene' => ['string','nullable'],
        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'price' => ['numeric', 'required','min:0'],

    ]);



    // Create a new employee instance and set its attributes
    $employee = employee::where('name', $request->name)->first();

    // Check if the employee exists
    if ($employee) {
        // Get the employee_id
        $d = $employee->id;

        // Insert data into 'muchdans' table
        DB::table('employeeexpenses')->insert([
            'name' => $request->name,
            'subject' => $request->Subject,
            'employee_id' => $d,
            'date' => $request->date,
            'tebene' => $request->tebene,
            'money' => $request->price,

        ]);

        $notification = [
            'message' => 'New Expenses added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Employee.Expenses')->with($notification);
    }
   }public function emexpensesedite($id){

    $muchdan = muchdan::all();
    $employess = employee::all();
    $emexpenses = employeeexpenses::findorfail($id);
    return view('backend.sell.expenses.employee.edite', compact('emexpenses','muchdan','employess'));
}
public function emexpensesupdate(Request $request, $id){

    $request->validate([
        'name' => ['required', 'string'],
        'Subject' => ['required','string'],
        'tebene' => ['string','nullable'],
        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'price' => ['numeric', 'required','min:0'],

    ]);



    // Create a new employee instance and set its attributes
    $employee = employee::where('name', $request->name)->first();

    // Check if the employee exists
    if ($employee) {
        // Get the employee_id
        $d = $employee->id;

        // Insert data into 'muchdans' table
        DB::table('employeeexpenses')->where('id', $id)
        ->update([
            'name' => $request->name,
            'subject' => $request->Subject,
            'employee_id' => $d,
            'date' => $request->date,
            'tebene' => $request->tebene,
            'money' => $request->price,

        ]);

        $notification = [
            'message' => 'The Employee Expenses Updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Employee.Expenses')->with($notification);
    }
} public function emexpensesdelete($id){
    try {
        $emexpenses = employeeexpenses::findOrFail($id);
        $emexpenses->delete();

        $notification = [
            'message' => 'The Employee Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Employee Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Employee.Expenses')->with($notification);
}
// end employee expenses

// start  Rental expenses
public function renexpensesshow(){
    $muchdan = muchdan::all();
        $employess = employee::all();
        $rentalexp= rental::all();
        return view('backend.sell.expenses.rental.show', compact('rentalexp','muchdan','employess'));
}public function renxpensesadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $rentalexp= rental::all();
    return view('backend.sell.expenses.rental.add', compact('rentalexp','muchdan','employess'));
} public function renexpensestore(Request $request){

        // Validate the request data
        $request->validate([
            'Month' => ['required', 'date','date_format:Y-m'],
            'price' => ['required', 'numeric','min:0'],

            'date' => ['required', 'date', 'date_format:Y-m-d'],

        ]);



        // Create a new employee instance
        $reexpenss = new rental();
        $reexpenss->mangusal = $request->Month;
        $reexpenss->price = $request->price;
        $reexpenss->date = $request->date;

        // Save the new employee
        $reexpenss->save();

        $notification = [
            'message' => 'New Rental Expenses added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Rental.Expenses')->with($notification);
}  public function renexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $ren= rental::findorfail($id);
    return view('backend.sell.expenses.rental.edite', compact('ren','muchdan','employess'));
}
public function renexpensesupdate(Request $request,$id){
      // Validate the request data
      $request->validate([
        'Month' => ['required', 'date','date_format:Y-m'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],

    ]);



    // Create a new employee instance
    $reexpenss = rental::findOrFail($id);
    $reexpenss->mangusal = $request->Month;
    $reexpenss->price = $request->price;
    $reexpenss->date = $request->date;

    // Save the new employee
    $reexpenss->save();

    $notification = [
        'message' => 'New Rental Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Rental.Expenses')->with($notification);
}public function renxpensesdelete($id){
    try {
        $reexpenss = rental::findOrFail($id);
        $reexpenss->delete();

        $notification = [
            'message' => 'This Rental Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Rental Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Rental.Expenses')->with($notification);
}
// book expenses
public function bookxpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $exbook = expenbook::all();
    return view('backend.sell.expenses.book.show', compact('exbook','muchdan','employess'));
}public function Booknxpensesadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $exbook = expenbook::all();
    return view('backend.sell.expenses.book.add', compact('exbook','muchdan','employess'));
}public function booknexpensestore(Request $request){
  // Validate the request data
  $request->validate([
    'Subject' => ['required', 'string'],
    'price' => ['required', 'numeric','min:0'],

    'date' => ['required', 'date', 'date_format:Y-m-d'],
    'tebene'=> ['string','nullable'],

]);



// Create a new employee instance
$exbook = new expenbook();
$exbook->subject = $request->Subject;
$exbook->price = $request->price;
$exbook->date = $request->date;
$exbook->tebeni=$request->tebene;

// Save the new employee
$exbook->save();

$notification = [
    'message' => 'New Book Expenses added successfully',
    'alert-type' => 'success',
];

return redirect()->route('Book.Expenses')->with($notification);
}

public function booknexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $exbook= expenbook::findorfail($id);
    return view('backend.sell.expenses.book.edite', compact('exbook','muchdan','employess'));
}public function bookexpensesupdate(Request $request,$id){
// Validate the request data
$request->validate([
    'Subject' => ['required', 'string'],
    'price' => ['required', 'numeric','min:0'],

    'date' => ['required', 'date', 'date_format:Y-m-d'],
    'tebene'=> ['string','nullable'],

]);



// Create a new employee instance
$exbook = expenbook::findOrFail($id);
$exbook->subject = $request->Subject;
$exbook->price = $request->price;
$exbook->date = $request->date;
$exbook->tebeni=$request->tebene;

// Save the new employee
$exbook->save();

$notification = [
    'message' => 'New Book Expenses updated successfully',
    'alert-type' => 'success',
];

return redirect()->route('Book.Expenses')->with($notification);
}
 public function booknxpensesdelete($id){
    try {
        $re = expenbook::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Book Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Book Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Book.Expenses')->with($notification);
}
public function Balancexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $balace = balanse::all();
    return view('backend.sell.expenses.balance.show', compact('balace','muchdan','employess'));
}public function Balanceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $balace = balanse::all();
    return view('backend.sell.expenses.balance.add', compact('balace','muchdan','employess'));
}public function Balancenexpensestore(Request $request){
// Validate the request data
$request->validate([
    'Subject' => ['required', 'string'],
    'price' => ['required', 'numeric','min:0'],

    'date' => ['required', 'date', 'date_format:Y-m-d'],
    'tebene'=> ['string','nullable'],

]);




$exbalance = new balanse();
$exbalance->subject = $request->Subject;
$exbalance->price = $request->price;
$exbalance->date = $request->date;
$exbalance->tebeni=$request->tebene;

// Save the new employee
$exbalance->save();

$notification = [
    'message' => 'New Balance Expenses added successfully',
    'alert-type' => 'success',
];

return redirect()->route('Balance.Expenses')->with($notification);
}
public function Balancenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $balace = balanse::findorfail($id);
    return view('backend.sell.expenses.balance.edite', compact('balace','muchdan','employess'));
}public function Balanceexpensesupdate(Request $request, $id){

// Validate the request data
$request->validate([
    'Subject' => ['required', 'string'],
    'price' => ['required', 'numeric','min:0'],

    'date' => ['required', 'date', 'date_format:Y-m-d'],
    'tebene'=> ['string','nullable'],

]);



// Create a new employee instance
$exbalance = balanse::findOrFail($id);
$exbalance->subject = $request->Subject;
$exbalance->price = $request->price;
$exbalance->date = $request->date;
$exbalance->tebeni=$request->tebene;

// Save the new employee
$exbalance->save();

$notification = [
    'message' => 'The Balance Expenses updated successfully',
    'alert-type' => 'success',
];

return redirect()->route('Balance.Expenses')->with($notification);


}public function Balancenxpensesdelete($id){
    try {
        $re = balanse::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Balance Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Balance Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Balance.Expenses')->with($notification);
}public function learncexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $learns = learning::all();
    return view('backend.sell.expenses.learning.show', compact('learns','muchdan','employess'));
}public function learnceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $learns = learning::all();
    return view('backend.sell.expenses.learning.add', compact('learns','muchdan','employess'));
}public function learnenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $learn = new learning();
    $learn->subject = $request->Subject;
    $learn->price = $request->price;
    $learn->date = $request->date;
    $learn->tebeni=$request->tebene;

    // Save the new employee
    $learn->save();

    $notification = [
        'message' => 'New Learning Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Learning.Expenses')->with($notification);
} public function learnenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $learns = learning::findOrFail($id);
    return view('backend.sell.expenses.learning.edite', compact('learns','muchdan','employess'));
}public function learnceexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $learn = learning::findOrFail($id);
    $learn->subject = $request->Subject;
    $learn->price = $request->price;
    $learn->date = $request->date;
    $learn->tebeni=$request->tebene;

    // Save the new employee
    $learn->save();

    $notification = [
        'message' => 'New Learning Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Learning.Expenses')->with($notification);
} public function learncenxpensesdelete($id){
    try {
        $re = learning::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Laerning Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Laerning Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Learning.Expenses')->with($notification);
}
// reklam expenses
public function reklamcexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $reks = reklam::all();
    return view('backend.sell.expenses.Rekalm.show', compact('reks','muchdan','employess'));
}public function reklamceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $reks = reklam::all();
    return view('backend.sell.expenses.Rekalm.add', compact('reks','muchdan','employess'));
}public function reklamenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $reks = new reklam();
    $reks->subject = $request->Subject;
    $reks->price = $request->price;
    $reks->date = $request->date;
    $reks->tebeni=$request->tebene;

    // Save the new employee
    $reks->save();

    $notification = [
        'message' => 'New Reklam Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Reklam.Expenses')->with($notification);
}public function reklamenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $reks = reklam::findOrFail($id);
    return view('backend.sell.expenses.Rekalm.edite', compact('reks','muchdan','employess'));
}public function reklamceexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $reks =reklam::findOrFail($id);
    $reks->subject = $request->Subject;
    $reks->price = $request->price;
    $reks->date = $request->date;
    $reks->tebeni=$request->tebene;

    // Save the new employee
    $reks->save();

    $notification = [
        'message' => 'New Reklam Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Reklam.Expenses')->with($notification);
}public function reklamcenxpensesdelete($id){
    try {
        $re = reklam::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Reklam Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Reklam Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Reklam.Expenses')->with($notification);
} public function Coursecexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $courses = course::all();
    return view('backend.sell.expenses.course.show', compact('courses','muchdan','employess'));
}public function Courseceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $courses = course::all();
    return view('backend.sell.expenses.course.add', compact('courses','muchdan','employess'));
}public function Courseenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $courses = new course();
    $courses->subject = $request->Subject;
    $courses->price = $request->price;
    $courses->date = $request->date;
    $courses->tebeni=$request->tebene;

    // Save the new employee
    $courses->save();

    $notification = [
        'message' => 'New Course Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Course.Expenses')->with($notification);
}
public function Courseenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $courses = course::findOrFail($id);
    return view('backend.sell.expenses.course.edite', compact('courses','muchdan','employess'));
}public function Courseeexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $courses = course::findOrFail($id);
    $courses->subject = $request->Subject;
    $courses->price = $request->price;
    $courses->date = $request->date;
    $courses->tebeni=$request->tebene;

    // Save the new employee
    $courses->save();

    $notification = [
        'message' => 'New Course Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Course.Expenses')->with($notification);
}public function Courseenxpensesdelete($id){
    try {
        $re = course::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Course Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Course Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Course.Expenses')->with($notification);
}public function Officecexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $offices = office::all();
    return view('backend.sell.expenses.office.show', compact('offices','muchdan','employess'));
}public function Officeceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $offices = office::all();
    return view('backend.sell.expenses.office.add', compact('offices','muchdan','employess'));
} public function Officeenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $offices = new office();
    $offices->subject = $request->Subject;
    $offices->price = $request->price;
    $offices->date = $request->date;
    $offices->tebeni=$request->tebene;

    // Save the new employee
    $offices->save();

    $notification = [
        'message' => 'New Office Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Office.Expenses')->with($notification);
} public function Officeenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $offices = office::findOrFail($id);
    return view('backend.sell.expenses.office.edite', compact('offices','muchdan','employess'));
} public function Officeeexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $offices =office::findOrFail($id);
    $offices->subject = $request->Subject;
    $offices->price = $request->price;
    $offices->date = $request->date;
    $offices->tebeni=$request->tebene;

    // Save the new employee
    $offices->save();

    $notification = [
        'message' => 'New Office Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Office.Expenses')->with($notification);
} public function Officeenxpensesdelete($id){
    try {
        $re =office::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Office Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Office Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Office.Expenses')->with($notification);
} public function technocexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $technos = technology::all();
    return view('backend.sell.expenses.technology.show', compact('technos','muchdan','employess'));
}public function technoceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $technos = technology::all();
    return view('backend.sell.expenses.technology.add', compact('technos','muchdan','employess'));
}
public function technoenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $technos = new technology();
    $technos->subject = $request->Subject;
    $technos->price = $request->price;
    $technos->date = $request->date;
    $technos->tebeni=$request->tebene;

    // Save the new employee
    $technos->save();

    $notification = [
        'message' => 'New Technological Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Technological.Expenses')->with($notification);
}



public function technoenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $technos = technology::findOrFail($id);
    return view('backend.sell.expenses.technology.adite', compact('technos','muchdan','employess'));
} public function technoexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $technos =technology::findOrFail($id);
    $technos->subject = $request->Subject;
    $technos->price = $request->price;
    $technos->date = $request->date;
    $technos->tebeni=$request->tebene;

    // Save the new employee
    $technos->save();

    $notification = [
        'message' => 'New Technological Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Technological.Expenses')->with($notification);
}public function technoenxpensesdelete($id){
    try {
        $re =technology::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Technological Expenses deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Technological Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Technological.Expenses')->with($notification);
} public function exhibocexpensesshow(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $pesh = peshanga::all();
    return view('backend.sell.expenses.peshanga.show', compact('pesh','muchdan','employess'));
}public function Exhceexpensadd(){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $pesh = peshanga::all();
    return view('backend.sell.expenses.peshanga.add', compact('pesh','muchdan','employess'));
}public function Exhenexpensestore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $pesh = new peshanga();
    $pesh->subject = $request->Subject;
    $pesh->price = $request->price;
    $pesh->date = $request->date;
    $pesh->tebeni=$request->tebene;

    // Save the new employee
    $pesh->save();

    $notification = [
        'message' => 'New Exhibition Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Exhibition.Expenses')->with($notification);
}public function Exhenexpensesedite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $pesh = peshanga::findOrFail($id);
    return view('backend.sell.expenses.peshanga.edite', compact('pesh','muchdan','employess'));
}public function Exhexpensesupdate(Request $request, $id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $pesh =peshanga::findOrFail($id);
    $pesh->subject = $request->Subject;
    $pesh->price = $request->price;
    $pesh->date = $request->date;
    $pesh->tebeni=$request->tebene;

    // Save the new employee
    $pesh->save();

    $notification = [
        'message' => 'New Exhibition Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('Exhibition.Expenses')->with($notification);
}public function Exhenxpensesdelete($id){
    try {
        $re =peshanga::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This Exhibition deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => 'Exhibition Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('Exhibition.Expenses')->with($notification);

}

// personal expenses

public function personalexpensesshow(){
    $muchdan = muchdan::all();
        $employess = employee::all();
        $pes = personal::all();
        return view('backend.sell.expenses.personal.show', compact('employess','muchdan','pes'));
}

public function Personaladd(){
    $muchdan = muchdan::all();
        $employess = employee::all();
        $pes = personal::all();
        return view('backend.sell.expenses.personal.add', compact('employess','muchdan','pes'));
}


// add
public function persolastore(Request $request){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $pers = new personal();
    $pers->subject = $request->Subject;
    $pers->price = $request->price;
    $pers->date = $request->date;
    $pers->tebeni=$request->tebene;

    // Save the new employee
    $pers ->save();

    $notification = [
        'message' => 'New Personal Expenses added successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('personal.Expenses')->with($notification);
}
public function Personaldite($id){
    $muchdan = muchdan::all();
    $employess = employee::all();
    $pes = personal::findOrFail($id);
    return view('backend.sell.expenses.personal.edite', compact('employess','muchdan','pes'));

}public function Personalupdate(Request $request,$id){
    $request->validate([
        'Subject' => ['required', 'string'],
        'price' => ['required', 'numeric','min:0'],

        'date' => ['required', 'date', 'date_format:Y-m-d'],
        'tebene'=> ['string','nullable'],

    ]);




    $pes =personal::findOrFail($id);
    $pes->subject = $request->Subject;
    $pes->price = $request->price;
    $pes->date = $request->date;
    $pes->tebeni=$request->tebene;

    // Save the new employee
    $pes->save();

    $notification = [
        'message' => 'New Personal Expenses updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('personal.Expenses')->with($notification);
}
public function personalsdelete($id){
    try {
        $re =personal::findOrFail($id);
        $re->delete();

        $notification = [
            'message' => 'This  Personal deleted successfully',
            'alert-type' => 'error',
        ];
    } catch (ModelNotFoundException $e) {
        // User not found
        $notification = [
            'message' => ' Personal Expenses not found',
            'alert-type' => 'info',
        ];
    }

    return redirect()->route('personal.Expenses')->with($notification);
}
}
