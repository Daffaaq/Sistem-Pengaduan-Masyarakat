<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Departements;

class ComplaintSuperadminController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::query();

        if ($request->has('department')) {
            $departmentId = $request->input('department');

            if ($departmentId) {
                $complaints->where('department_id', $departmentId);
            }
        }

        $complaints = $complaints->get();
        $departments = Departements::all();

        return view('superadmin.complaints.index', compact('complaints', 'departments'));
    }

}
