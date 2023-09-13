<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Mendapatkan jumlah total complaints yang dimiliki oleh pengguna yang sedang login
        $totalComplaints = Complaint::where('user_id', $userId)->count();

        // Mendapatkan jumlah complaints dengan status pending yang dimiliki oleh pengguna yang sedang login
        $pendingComplaints = Complaint::where('user_id', $userId)->where('status', 'pending')->count();

        // Mendapatkan jumlah complaints dengan status in progress yang dimiliki oleh pengguna yang sedang login
        $inProgressComplaints = Complaint::where('user_id', $userId)->where('status', 'in progress')->count();

        // Mendapatkan jumlah complaints dengan status resolved yang dimiliki oleh pengguna yang sedang login
        $resolvedComplaints = Complaint::where('user_id', $userId)->where('status', 'resolved')->count();

        // Mendapatkan data komplain berdasarkan bulan komplain
        $complaintsByMonth = Complaint::where('user_id', $userId)
            ->select(
                DB::raw('YEAR(complaint_date) as year'),
                DB::raw('MONTH(complaint_date) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get();

        // Menginisialisasi array untuk data bulan dan jumlah komplain
        $complaintMonths = [];
        $complaintCounts = [];

        foreach ($complaintsByMonth as $complaint) {
            $complaintMonths[] = date('M Y', mktime(0, 0, 0, $complaint->month, 1, $complaint->year));
            $complaintCounts[] = $complaint->count;
        }

        return view('masyarakat.dashboard.index', compact('totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints', 'complaintMonths', 'complaintCounts'));

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
    public function show($id)
    {
        //
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
