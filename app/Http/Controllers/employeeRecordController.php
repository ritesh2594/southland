<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\employeeRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeRecordController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            // $otherEmployee_involved=$request->otherEmployee_involved == 'Yes' ? $request->otherEmp : $request->otherEmployee_involved;
            $this->validate($request, [
                'incidentDate' => 'required',
                'incidentTime' => 'required',
                'injury' => 'required',
                'tempEmployee' => 'required',
                'employeeName' => 'required',
                'employeeId' => 'required',
                'department' => 'required',
                'jobTitle' => 'required',
                'involvedContact' => 'required|numeric|digits:10',
                'supervisorName' => 'required',
                'otherEmployee_involved' => 'required',
                'incidentOccur' => 'required',
                'employeeBefore' => 'required',
                'happenedBelow' => 'required'
            ]
            // ,
            // ['involvedContact.min' => 'Contact must be 10']
        );
            try {
                DB::beginTransaction();
                employeeRecord::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'incidentDate' => date("Y-m-d", strtotime($request->incidentDate)),
                        'incidentTime' => date("H:i:s", strtotime($request->incidentTime)),
                        'injury' => $request->injury,
                        'tempEmployee' => $request->tempEmployee,
                        'employeeName' => $request->employeeName,
                        'employeeId' => $request->employeeId,
                        'department' => $request->department,
                        'jobTitle' => $request->jobTitle,
                        'involvedContact' => $request->involvedContact,
                        'supervisorName' => $request->supervisorName,
                        'otherEmployee_involved' => $request->otherEmployee_involved == 'Yes' ? $request->otherEmp : $request->otherEmployee_involved,
                        'incidentOccur' => $request->incidentOccur,
                        'employeeBefore' => $request->employeeBefore,
                        'happenedBelow' => $request->happenedBelow
                    ]
                );
                DB::commit();
                if ($request->ajax()) {
                    return response()->json(['message' => $request->id ? 'Form updated successfully' : 'Form submitted successfully']);
                }
                return redirect()->route('near-miss')->withSuccess($request->id ? 'Form updated successfully' : 'Form submitted successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['Something went wrong']);
            }
        } else {
            $formdata = null;
            return view('near-miss', ['formdata' => $formdata]);
        }
    }
}
