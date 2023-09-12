<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;

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

        return view('masyarakat.dashboard.index', compact('totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints'));
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
