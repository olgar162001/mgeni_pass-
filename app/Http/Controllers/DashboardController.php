<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Visitor;
use App\Models\PreRegister;


class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $totalEmployees = Employee::count();
        $totalVisitors = Visitor::count();
        $totalPreRegisters = PreRegister::count();

        // Get a list of visitors for the table
        $visitors = Visitor::latest()->take(10)->get();

        // Pass the data to the view
        return view('dashboard', compact('totalEmployees', 'totalVisitors', 'totalPreRegisters', 'visitors'));
    }
}
