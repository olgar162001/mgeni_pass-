<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Visitor;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // Display a list of employees
    public function index()
    {
        $employees = Employee::with(['department', 'designation'])->paginate(10); // Optimized with pagination
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();

        return view('employees.create', compact('departments', 'designations'));
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|string|max:15',
            'joining_date' => 'required|date',
            'gender' => 'required',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:Active,Inactive',
            'about' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
    
        dd($validated); // Debug validated data to ensure it's correct
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }
    
        $validated['password'] = bcrypt($validated['password']);
        Employee::create($validated);
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
    
    // Show the form for editing an existing employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $designations = Designation::all();

        return view('employees.edit', compact('employee', 'departments', 'designations'));
    }

    // Update an employee's data
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'required|string|max:15',
            'joining_date' => 'required|date',
            'gender' => 'required',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'status' => 'required|in:Active,Inactive',
            'about' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }

            // Save the new image
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }

        // Update the employee
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Delete the employee's image if it exists
        if ($employee->image) {
            Storage::disk('public')->delete($employee->image);
        }

        // Delete the employee record
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    // Display details of an employee
    public function show($id)
    {
        $employee = Employee::with(['department', 'designation'])->findOrFail($id);
        $visitors = Visitor::where('employee_id', $id)->get();

        return view('employees.show', compact('employee', 'visitors'));
    }
}
