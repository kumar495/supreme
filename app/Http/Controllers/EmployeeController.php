<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{

    public function index()
    {

        $employees = Employee::all();
        return view('employees.show', compact('employees'));
    }
    
    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
{
    
   
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'position' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $employee = new Employee;
    $employee->name = $request->name;
    $employee->address = $request->address;
    $employee->position = $request->position;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'employees/';
        $image->move($imagePath, $imageName);
        $employee->image = $imagePath . $imageName;
    }

    $employee->save();

    return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    
}


    public function show($id)
    {
        $employees = Employee::find($id);
    
        if (!$employee) {
            return abort(404); 
        }
    
        return view('employees.show', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
    
        if (!$employee) {
            return abort(404);
        }
    
        return view('employees.edit', compact('employee'));
    }
    public function update(EmployeeRequest $request, $id)
    {
        $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'position' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
        $employee = Employee::find($id);
    
        if (!$employee) {
            return abort(404);
        }
    
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->position = $request->position;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'employees/';
            $image->move($imagePath, $imageName);
            $employee->image = $imagePath . $imageName;
        }
    
        $employee->save();
    
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }
    

    public function destroy($id)
    {
        $employee = Employee::find($id);
    
        if (!$employee) {
            return abort(404);
        }
    
        $employee->delete();
    
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
