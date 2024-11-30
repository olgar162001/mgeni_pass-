<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationsController extends Controller
{
    public function index()
    {
        // Fetch all designations
        $designations = Designation::all();
        return view('designations.index', compact('designations'));
    }

    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        Designation::create($request->all());

        return redirect()->route('designations.index')->with('success', 'Designation created successfully!');
    }

    public function edit($id)
    {
        $designation = Designation::findOrFail($id); // Retrieve Designation by ID or throw 404
        return view('designations.edit', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $designation = Designation::findOrFail($id);
        $designation->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('designations.index')->with('success', 'Designation updated successfully!');
    }

    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
    
        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully!');
    }
}

