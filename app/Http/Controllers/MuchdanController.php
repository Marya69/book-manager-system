<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\muchdan;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MuchdanController extends Controller
{
    //

    public function showmucha()
    {
        $users = User::all();
        $employess = employee::all();
        $muchdan = Muchdan::all();


        return view('backend.sell.account.muchadan.showmuchdan', compact('muchdan', 'employess', 'users'));
    }
    public function addmucha()
    {
        $muchdan = Muchdan::all();


        $employess = employee::all();
        return view('backend.sell.account.muchadan.add', compact('muchdan', 'employess'));
    }
    public function addmuchadan(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'Month' => ['required'],
            'Year' => ['required'],
            'Start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'salary' => ['numeric', 'required','min:0'],
              'reward'=> ['numeric','min:0','nullable']
        ]);

        $name = $request->name;
        $month = $request->Month;
        $year = $request->Year;

        // Check if entry with the provided name, month, and year already exists in muchdans table
        $existingEntry = DB::table('muchdans')
            ->where('name', $name)
            ->where('mang', $month)
            ->where('year', $year)
            ->first();

        if ($existingEntry) {
            // Entry with the same name, month, and year already exists
            // Display a notification
            $notification = [
                'message' => 'Employee with the same name, month, and year already exists. Salary: ' . $existingEntry->salary,
                'alert-type' => 'error',
            ];

            return redirect()->route('Muchadrawakn')->with($notification);
        }

        // Create a new employee instance and set its attributes
        $employee = employee::where('name', $request->name)->first();

        // Check if the employee exists
        if ($employee) {
            // Get the employee_id
            $d = $employee->id;

            // Insert data into 'muchdans' table
            DB::table('muchdans')->insert([
                'name' => $request->name,
                'mang' => $request->Month,
                'year' => $request->Year,
                'date' => $request->Start_date,
                'salary' => $request->salary,
                'reward' => $request->reward,
                'employee_id' => $d,
                'thatuser_get_salary' => Auth::user()->name
            ]);

            $notification = [
                'message' => 'New Employee added successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('Muchadrawakn')->with($notification);
        }
    }
    public function editemuchada($id)
    {
        $muchdan = Muchdan::where('id', $id)->orderBy('created_at')->firstOrFail();

        $employess = employee::all();
        return view('backend.sell.account.muchadan.edite', compact('muchdan', 'employess'));
    }
    public function updatemucha(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'Month' => ['required'],
            'Year' => ['required'],
            'Start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'salary' => ['numeric', 'required','min:0'],
              'reward'=> ['numeric','min:0','nullable']
        ]);

        // Check if an entry with the provided ID exists in muchdans table
        $existingEntry = DB::table('muchdans')->where('id', $id)->first();

        if ($existingEntry) {
            // Check if an entry with the same name, month, and year exists
            $duplicateEntry = DB::table('muchdans')
                ->where('name', $request->name)
                ->where('mang', $request->Month)
                ->where('year', $request->Year)
                ->where('id', '!=', $id) // Exclude the current entry being updated
                ->exists();

            if ($duplicateEntry) {
                // Entry with the same name, month, and year already exists
                // Display a notification
                $notification = [
                    'message' => 'Employee with the same name, month, and year already exists. Cannot update.',
                    'alert-type' => 'error',
                ];

                return redirect()->route('Muchadrawakn')->with($notification);
            }

            // Update the entry with the provided data
            DB::table('muchdans')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'mang' => $request->Month,
                    'year' => $request->Year,
                    'date' => $request->Start_date,
                    'salary' => $request->salary,
                    'reward' => $request->reward,
                    'thatuser_get_salary' => Auth::user()->name
                ]);

            $notification = [
                'message' => 'Employee details updated successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('Muchadrawakn')->with($notification);
        } else {
            // Entry with the provided ID does not exist
            $notification = [
                'message' => 'Employee with the provided ID not found',
                'alert-type' => 'error',
            ];

            return redirect()->route('Muchadrawakn')->with($notification);
        }
    }
    public function deletemucha($id)
    {
        try {
            $entry = Muchdan::findOrFail($id); // Find the entry by ID
            $entry->delete(); // Delete the entry

            $notification = [
                'message' => 'The Salary deleted successfully',
                'alert-type' => 'success',
            ];
        } catch (ModelNotFoundException $e) {
            // Entry not found
            $notification = [
                'message' => 'The Salary not found',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('Muchadrawakn')->with($notification);
    }
}
