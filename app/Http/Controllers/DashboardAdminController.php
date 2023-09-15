<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Answercomplaints;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $departmentName = $user->department->name;

        // Mendapatkan jumlah total complaints berdasarkan department
        $totalComplaints = Complaint::where('department_id', $user->department->id)->count();

        // Mendapatkan jumlah complaints dengan status pending berdasarkan department
        $pendingComplaints = Complaint::where('department_id', $user->department->id)
            ->where('status', 'pending')
            ->count();

        // Mendapatkan jumlah complaints dengan status in progress berdasarkan department
        $inProgressComplaints = Complaint::where('department_id', $user->department->id)
            ->where('status', 'in progress')
            ->count();

        // Mendapatkan jumlah complaints dengan status resolved berdasarkan department
        $resolvedComplaints = Complaint::where('department_id', $user->department->id)
            ->where('status', 'resolved')
            ->count();

        // Mendapatkan jumlah complaints dengan jawaban berdasarkan department
        $answeredComplaints = Answercomplaints::where('department_id', $user->department->id)->count();

        // Mendapatkan data komplain berdasarkan bulan komplain
        $complaintsByMonth = Complaint::where('department_id', $user->department->id)
            // Memilih model Complaint dengan kondisi where 'user_id' sama dengan $userId
            ->select(
                DB::raw('YEAR(complaint_date) as year'),
                DB::raw('MONTH(complaint_date) as month'),
                DB::raw('COUNT(*) as count')
            )
            // Memilih kolom 'year', 'month', dan menghitung jumlah komplain
            ->groupBy('year', 'month')
            // Mengelompokkan data berdasarkan 'year' dan 'month'
            ->orderBy('year', 'ASC')
            // Mengurutkan hasil berdasarkan tahun (asc = ascending)
            ->orderBy('month', 'ASC')
            // Mengurutkan hasil berdasarkan bulan (asc = ascending)
            ->get();
            // Mengambil hasil query dan menyimpannya dalam variabel $complaintsByMonth


        // Menginisialisasi array untuk data bulan dan jumlah komplain
        $complaintMonths = [];
        $complaintCounts = [];

        foreach ($complaintsByMonth as $complaint) {
            $complaintMonths[] = date('M Y', mktime(0, 0, 0, $complaint->month, 1, $complaint->year));
            $complaintCounts[] = $complaint->count;
        }

        return view('admin.dashboard_admin.index', compact('departmentName', 'totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints', 'answeredComplaints', 'complaintMonths', 'complaintCounts'));

        // return view('admin.layouts.master');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $departmentName = $user->department->name;

        // Mendapatkan jumlah total complaints
        $totalComplaints = Complaint::count();

        // Mendapatkan jumlah complaints dengan status pending
        $pendingComplaints = Complaint::where('status', 'pending')->count();

        // Mendapatkan jumlah complaints dengan status in progress
        $inProgressComplaints = Complaint::where('status', 'in progress')->count();

        // Mendapatkan jumlah complaints dengan status resolved
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();

        return view('admin.dashboard_admin.index', compact('departmentName', 'totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
