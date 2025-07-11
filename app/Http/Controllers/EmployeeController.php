<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\muchdan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //

    public function employee()
    {
        $muchdan = muchdan::all();
        $employess = employee::all();
        return view('backend.sell.account.emplyee.emplyee', compact('employess', 'muchdan'));
    }
    //addemployes
    public function addemployes()
    {
        $muchdan = muchdan::latest()->first();
        $employess = employee::all();
        return view('backend.sell.account.emplyee.add', compact('employess', 'muchdan'));
    }
    public function addemployondatabase(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'unique:employees'],
            'phone' => ['required', 'numeric', 'regex:/^\d{11}$/'],
            'Birthday' => ['nullable', 'date', 'date_format:Y-m-d'],
            'Start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'salary' => ['required', 'numeric', 'min:0'],
        ]);

        // Check if the name already exists
        if (Employee::where('name', $request->name)->exists()) {
            // If the name already exists, return with an error
            $notification = [
                'message' => 'Name already exists for another employee',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification)->withErrors(['name' => 'Name already exists for another employee']);
        }

        // Create a new employee instance
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->borndate = $request->Birthday;
        $employee->dateofwork = $request->Start_date;
        $employee->salary = $request->salary;

        // Save the new employee
        $employee->save();

        $notification = [
            'message' => 'New Employee added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Employee')->with($notification);
    }
    public function editeemployondatabase($id)
    {
        $employess = employee::all();
        $muchdan = muchdan::all();
        $selecteduser = employee::findOrFail($id);
        // Fetch the user without hashing the password

        return view('backend.sell.account.emplyee.edite', compact('selecteduser', 'employess', 'muchdan'));
    }
    public function updateemployondatabase(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'unique:employees,name,' . $id],
            'phone' => ['required', 'numeric', 'regex:/^\d{11}$/'],
            'Birthday' => ['nullable', 'date', 'date_format:Y-m-d'],
            'Start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'salary' => ['required', 'numeric', 'min:0'],
        ]);

        // Check if the name already exists
        if (Employee::where('name', $request->name)->where('id', '!=', $id)->exists()) {
            // If the name already exists for a different employee, return with an error
            $notification = [
                'message' => 'Name already exists for another employee',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification)->withErrors(['name' => 'Name already exists for another employee']);
        }

        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // Update employee attributes
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->borndate = $request->Birthday;
        $employee->dateofwork = $request->Start_date;
        $employee->salary = $request->salary;

        // Save the updated employee
        $employee->save();

        $notification = [
            'message' => 'Updated Employee successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Employee')->with($notification);
    }
    public function deleteemployondatabase($id)
    {
        try {
            $employee = employee::findOrFail($id);
            $employee->delete();

            $notification = [
                'message' => 'This Employee deleted successfully',
                'alert-type' => 'error',
            ];
        } catch (ModelNotFoundException $e) {
            // User not found
            $notification = [
                'message' => 'Employee not found',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('Employee')->with($notification);
    }
}
