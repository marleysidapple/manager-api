<?php

namespace App\Http\Controllers\api\v1;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function listEmployee()
    {
        $employee = Employee::all();
        return response()->json($employee, 200);
    }

    public function addEmployee(EmployeeRequest $request)
    {
        try {
            $emp = Employee::create([
                'name'  => $request->name,
                'phone' => $request->phone,
                'shift' => $request->shift
            ]);
        } catch (Exception $e) {
            return response()->json(['err' => 'Failed'], 500);
        }

        return response()->json($emp, 200);
    }
}
