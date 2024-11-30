<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Visitor; // Import Visitor model
use App\Models\Employee; // Import Employee model
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    // Display the search page for visitors
    public function showsearch()
    {
        return view('visitor.havebeenhere');
    }

    // Show the visitor edit page by ID
    public function showedit($id)
    {
        // Retrieve visitor details by ID
        $visitor = Visitor::with('employee')->findOrFail($id);

        // Pass visitor and related employee data to the view
        return view('visitor.update-info', compact('visitor'));
    }

    // Validate and search for a visitor by token, email, phone, or ID number
    public function checkToken(Request $request)
    {
        $request->validate([
            'search_field' => 'required|string',
        ]);

        $searchField = $request->input('search_field');

        // Search for a visitor using multiple fields
        $visitor = Visitor::where('token', $searchField)
            ->orWhere('email', $searchField)
            ->orWhere('phone', $searchField)
            ->orWhere('id_no', $searchField)
            ->first();

        if (!$visitor) {
            return back()->withErrors(['search_field' => 'Visitor not found.']);
        }

        // Redirect to the update-info page with visitor details
        return view('visitor.update-info', compact('visitor'));
    }

    // Store updated information for the visitor
    public function storeInfo(Request $request, $id)
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,id', // Validate employee ID
        ]);

        $visitor = Visitor::findOrFail($id);

        // Update visitor's purpose and associated employee
        $visitor->update([
            'purpose' => $request->input('purpose'),
            'employee_id' => $request->input('employee_id'), // Save employee ID
        ]);

        // Redirect to the photo capture page
        return redirect()->route('visitor.capturePhoto', $visitor->id);
    }

    // Store the visitor's photo
    public function storePhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|string', // Validate base64 image
        ]);

        $visitor = Visitor::findOrFail($id);

        // Decode and save the photo
        $photo = $request->input('photo');
        $photoPath = 'sphotos/' . uniqid() . '.png'; // Save in the storage directory
        $decodedPhoto = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photo));
        Storage::disk('public')->put($photoPath, $decodedPhoto); // Save photo in public storage

        // Update the visitor record with the photo path
        $visitor->update([
            'photo' => 'storage/' . $photoPath, // Use public storage path
        ]);

        // Redirect to success page
        return redirect()->route('visitor.success', $visitor->id)
            ->with('success', 'Visitor checked in successfully!');
    }

    // Success page after completing visitor registration
    public function success($id)
    {
        $visitor = Visitor::with('employee')->findOrFail($id);
        return view('visitor.success', compact('visitor'));
    }
}
