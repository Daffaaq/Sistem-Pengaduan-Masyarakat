<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexberanda()
    {
        // Mendapatkan jumlah total complaints
        $totalComplaints = Complaint::count();

        // Mendapatkan jumlah complaints dengan status pending
        $pendingComplaints = Complaint::where('status', 'pending')->count();

        // Mendapatkan jumlah complaints dengan status in progress
        $inProgressComplaints = Complaint::where('status', 'in progress')->count();

        // Mendapatkan jumlah complaints dengan status resolved
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();
        return view('landingpage.beranda', compact('totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints',));
    }
    public function indexTentang()
    {
        return view('landingpage.tentang');
    }
    public function indexStatik()
    {
        // Mendapatkan jumlah total complaints
        $totalComplaints = Complaint::count();

        // Mendapatkan jumlah complaints dengan status pending
        $pendingComplaints = Complaint::where('status', 'pending')->count();

        // Mendapatkan jumlah complaints dengan status in progress
        $inProgressComplaints = Complaint::where('status', 'in progress')->count();

        // Mendapatkan jumlah complaints dengan status resolved
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();
        return view('landingpage.statistik', compact('totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints',));
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
