<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\muchdan;
use App\Models\prodect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prodectController extends Controller
{
    //
    public function prodect()
    {

        $prodects=prodect::all();
        $muchdan = muchdan::all();
        $employess = employee::all();
        return view('backend.sell.prodect.show_all_prodect', compact('employess', 'muchdan','prodects'));
    }public function addbook(){
        $prodects=prodect::all();
        $muchdan = muchdan::all();
        $employess = employee::all();
        return view('backend.sell.prodect.add_prodect', compact('employess', 'muchdan','prodects'));
    }
    public function addbookondatabase(Request $request){
        // Validate the input fields
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'numeric'],
            'Price' => ['required', 'numeric', 'min:250'],
            'count' => ['required', 'numeric', 'min:0'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000000'], // Reduced max size for image validation
            'date' => ['date'],
        ]);

        // Check if the book with the same name already exists
        $existingBookName = DB::table('prodects')->where('name', $request->name)->first();

        if ($existingBookName) {
            // If a book with the same name exists, return with an error notification
            $notification = [
                'message' => 'A book with the same name already exists',
                'alert-type' => 'error',
            ];
            return redirect()->route('add.book')->with($notification);
        }

        // Check if the book with the same code already exists
        $existingBookCode = DB::table('prodects')->where('code', $request->code)->first();

        if ($existingBookCode) {
            // If a book with the same code exists, return with an error notification
            $notification = [
                'message' => 'A book with the same code already exists',
                'alert-type' => 'error',
            ];
            return redirect()->route('add.book')->with($notification);
        }

        // Prepare the data for insertion
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->Price,
            'date' => $request->date,
            'count' => $request->count,
            'image' => '',
        ];

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newimage = date('YmdHi') . rand() . "." . $file->getClientOriginalExtension();
            //this is error $file->move(public_path('uploads'), $newimage);
            $file->move(public_path('uploads\profile'), $newimage);
            $data['image'] = 'uploads/profile/' . $newimage;
        }

        // Insert the new book into the database
        DB::table('prodects')->insert($data);

        // Success notification
        $notification = [
            'message' => 'New Book added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Prodect')->with($notification);
    }


    public function editbook($id){
        $employess = employee::all();
        $muchdan = muchdan::all();
        $selectprodect = prodect::findOrFail($id);
        return view('backend.sell.prodect.edite', compact('employess', 'muchdan','selectprodect'));
    }

    public function updatebook(Request $request, $id){
        $existingBook = DB::table('prodects')->where('id', $id)->first();
        $existingName = $existingBook->name;
        $existingImage = $existingBook->image;

        $rules = [
            'code' => ['required', 'numeric'],
            'Price' => ['required', 'numeric', 'min:250'],
            'count' => ['required', 'numeric', 'min:0'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'], // Reduced max size for image validation
            'date' => ['date'],
        ];

        // Add 'unique' rule conditionally only if the name is changed
        if ($request->name !== $existingName) {
            $rules['name'] = ['required', 'string'];
        }

        $request->validate($rules);

        // Check if a book with the same name already exists (excluding the current book)
        if ($request->name !== $existingName) {
            $existingBookName = DB::table('prodects')
                ->where('name', $request->name)
                ->where('id', '!=', $id)
                ->first();

            if ($existingBookName) {
                // $notification = [
                //     'message' => 'A book with the same name already exists',
                //     'alert-type' => 'error',
                // ];
                // return redirect()->route('Prodect')->with($notification);
                return redirect()->back()->withErrors(['name' => 'A book with the same name already exists']);
            }
        }

        // Check if a book with the same code already exists (excluding the current book)
        $existingBookCode = DB::table('prodects')
            ->where('code', $request->code)
            ->where('id', '!=', $id)
            ->first();

        if ($existingBookCode) {
            // $notification = [
            //     'message' => 'A book with the same code already exists',
            //     'alert-type' => 'error',
            // ];
            // return redirect()->route('Prodect')->with($notification);
            return redirect()->back()->withErrors(['code' => 'A book with the same code already exists']);
        }

        // Check if an image file is uploaded
        if ($request->file('image')) {
            $file = $request->file('image');
            $newimage = date('YmdHi') . rand() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $newimage);
            $imagepath = 'uploads/profile/' . $newimage;

            // If there's an existing image, delete it
            if ($existingImage) {
                unlink(public_path($existingImage));
            }
        } else {
            // If no new image is uploaded, retain the existing image path
            $imagepath = $existingImage;
        }

        // Update the record
        DB::table('prodects')->where('id', $id)->update([
            'name' => $request->name ?? $existingName, // If name is not set in the request, keep the existing name
            'code' => $request->code,
            'price' => $request->Price,
            'date' => $request->date,
            'count' => $request->count,
            'image' => $imagepath,
        ]);

        $notification = [
            'message' => 'The book was updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('Prodect')->with($notification);
    }

     public function deletebook($id){
        try {
            $entry = prodect::findOrFail($id); // Find the entry by ID
            $entry->delete(); // Delete the entry

            $notification = [
                'message' => 'The Book deleted successfully',
                'alert-type' => 'success',
            ];
        } catch (ModelNotFoundException $e) {
            // Entry not found
            $notification = [
                'message' => 'The Book not found',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('Prodect')->with($notification);
    }
 

}
