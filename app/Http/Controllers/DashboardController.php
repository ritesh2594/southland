<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\employeeRecord;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }


    public function edit($id)
    {
        $formdata = null;
        if ($id) {
            $formdata = employeeRecord::find($id);
            // dd($formdata);   
            // $likedJobs = JsaForm::where('job_type_id', $job->job_type_id)->where('id', '<>', $id)->orderBy('id', 'DESC')->get();
            // return view('dashboard.jobs.job-details', ['job' => $job, 'likedJobs' => $likedJobs]);
            return view('admin.near-missEdit', ['formdata' => $formdata]);
        }
        abort(404);
    }
    public function destroy($id)
    {
        if ($id) {
            try {
                DB::beginTransaction();
                $data = employeeRecord::find($id);
                if ($data) {
                    $data->delete();
                    DB::commit();
                    return redirect()->back()->withSuccess('Record deleted successfully');
                } else {
                    return redirect()->back()->withErrors(['Record not found']);
                }
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['Something went wrong']);
            }
        }
    }
    public function listNearMiss(Request $request)
    {
        $pageSize = 2;
        $query = employeeRecord::query();
        if ($request->search) {

            if ($request->employeeName) {
                $query->where('employeeName', 'LIKE', "%$request->employeeName%");
            }
            if ($request->department) {
                $query->where('department', 'LIKE', "%$request->department%");
            }
            if ($request->supervisorName) {
                $query->where('supervisorName', 'LIKE', "%$request->supervisorName%");
            }
        }
        if ($request->sort_type && $request->column_name){
            $column_name = $request->column_name;
            $sort_type = $request->sort_type;
            $query->orderBy($column_name, $sort_type);
        }
        if ($request->pagesize) {
            $pageSize = $request->pagesize;
        }
    
        $find = $query->paginate($pageSize);
        if ($request->ajax()) {
            $returnHTML = view('admin.searchNearMiss', ['datas' => $find])->render();
            return response()->json(['html' => $returnHTML]);
            return view('admin.near_missTable', ['datas' => $find]);
        }
        return view('admin.near_missTable', ['datas' => $find]);
    }
}
