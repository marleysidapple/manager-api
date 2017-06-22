<?php

namespace App\Http\Controllers\api\v1;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function listEmployee($id = null)
    {

        $employee = (is_null($id) ? Employee::all() : Employee::find($id));
        return response()->json($employee, 200);
    }

    public function addEmployee(EmployeeRequest $request)
    {
        try {
            $emp = Employee::create([
                'name'  => $request->name,
                'phone' => $request->phone,
                'shift' => $request->shift,
            ]);
        } catch (Exception $e) {
            return response()->json(['err' => 'Failed'], 500);
        }

        return response()->json($emp, 200);
    }

    public function updateEmployee(Request $request, $id)
    {
        $emp        = Employee::find($id);
        $emp->name  = !is_null($request->name) ? $request->name : $emp->name;
        $emp->phone = !is_null($request->phone) ? $request->phone : $emp->phone;
        $emp->shift = !is_null($request->shift) ? $request->shift : $emp->shift;

        $emp->save();

        return response()->json($emp, 200);
    }
}
