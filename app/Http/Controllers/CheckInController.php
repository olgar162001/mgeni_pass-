<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Visitor; // Import your Visitor model
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class CheckInController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('check-in.create_step', compact('employees'));

    }
    public function showPhotoPage($id)
    {
        // Retrieve visitor details by ID
        $visitor = Visitor::findOrFail($id);

        // Return the view for the photo capture page
        return view('check-in.photo', compact('visitor'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'employee_id' => 'required|exists:employees,id', // Validate employee_id
            'id_no' => 'required|string',
            'purpose' => 'required|string',
        ]);
    
        Visitor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'employee_id' => $request->employee_id,
            'company_name' => $request->company_name,
            'id_no' => $request->id_no,
            'purpose' => $request->purpose,
            'address' => $request->address,
            'photo' => $request->photo,
            'token' => Str::random(50), // Generate a unique token
        ]);
    
        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully!');
    }
    

    

    public function storePhoto(Request $request, $id)
{
    // Validate the photo input
    $request->validate([
        'photo' => 'required',
    ]);

    // Find the visitor by ID
    $visitor = Visitor::findOrFail($id);

    // Decode the base64 image
    $imageData = $request->photo;
    $fileName = uniqid() . '.png';
    $filePath = 'photos/' . $fileName;

    // Save the photo to storage
    Storage::disk('public')->put($filePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));

    // Update the visitor record with the photo path
    $visitor->update([
        'photo' => $filePath,
    ]);

    // Redirect to the ID card display page
    return redirect()->route('check-in.id-Card', $visitor->id);
}


    public function showIdCard($id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('check-in.id-card', compact('visitor'));
    }

    


}
