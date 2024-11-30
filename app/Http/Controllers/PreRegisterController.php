<?php

namespace App\Http\Controllers;

use App\Models\PreRegister;
use App\Models\Employee;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    public function index()
    {
        $preRegisters = PreRegister::with('employee')->get(); // Eager load employee data
       
        return view('pre-registers.index', compact('preRegisters'));
    }
    public function create()
    {
        $employees = Employee::all(); // Fetch employees for the dropdown
        return view('pre-registers.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:pre_registers',
            'phone' => 'required|string|max:20',
            'national_id' => 'required|string|max:20|unique:pre_registers',
            'gender' => 'required|in:Male,Female,Other',
            'employee_id' => 'required|exists:employees,id',
            'expected_date' => 'required|date',
            'expected_time' => 'required',
            'comment' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        PreRegister::create($request->all());

        return redirect()->route('pre-registers.index')->with('success', 'Pre-registration created successfully.');
    }

    public function show(PreRegister $preRegister)
    {
        return view('pre-registers.show', compact('preRegister'));
    }

    public function update(Request $request, PreRegister $preRegister)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'employee' => 'required',
            'expected_date' => 'required|date',
            'expected_time' => 'required',
        ]);

        $preRegister->update($validated);

        return redirect()->route('pre-registers.index')->with('success', 'Pre-register updated successfully.');
    }

    public function destroy(PreRegister $preRegister)
    {
        $preRegister->delete();

        return redirect()->route('pre-registers.index')->with('success', 'Pre-register deleted successfully.');
    }
}
 
