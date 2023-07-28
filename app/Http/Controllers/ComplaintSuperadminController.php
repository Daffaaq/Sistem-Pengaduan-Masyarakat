<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Departements;
use PDF;

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

         $complaints = $complaints->paginate(5); // Paginate with 5 items per page
        $departments = Departements::all();
        // $id = $departmentId;

        return view('superadmin.complaints.index', compact('complaints', 'departments'));
    }

    public function cetak_pdf(Request $request)
{
    $departmentId = $request->query('departmentId');
    $complaints = Complaint::query();

    if ($departmentId) {
        $complaints->where('department_id', $departmentId);
    }

    $complaints = $complaints->get();
    $department = Departements::find($departmentId);

    $data = [
        'complaints' => $complaints,
        'department' => $department,
    ];

    $pdf = PDF::loadview('superadmin.complaints.cetak_pdf', $data);
    return $pdf->stream();
}



}
