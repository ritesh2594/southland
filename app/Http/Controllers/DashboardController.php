<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\employeeRecord;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }
    public function listNearMiss()
    {
        $datas = employeeRecord::all();
        return view('admin.near_missTable', ['datas' => $datas]);
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
}
