<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Departements;
use App\Models\polls;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Fungsi untuk menangani aksi like
    public function likePoll($id)
    {
        // Cari data polling berdasarkan ID
        $poll = polls::findOrFail($id);

        // Tingkatkan jumlah likes
        $poll->likes++;

        // Simpan perubahan ke database
        $poll->save();

        // Berikan respons bahwa aksi like berhasil
        return response()->json(['message' => 'Poll liked successfully', 'likes' => $poll->likes]);
    }

    // Fungsi untuk menangani aksi dislike
    public function dislikePoll($id)
    {
        // Cari data polling berdasarkan ID
        $poll = polls::findOrFail($id);

        // Tingkatkan jumlah dislikes
        $poll->dislikes++;

        // Simpan perubahan ke database
        $poll->save();

        // Berikan respons bahwa aksi dislike berhasil
        return response()->json(['message' => 'Poll disliked successfully', 'dislikes' => $poll->dislikes]);
    }
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
        $departements = Departements::all();
        // Mendapatkan data polling
        $polls = polls::all();
        // dd($polls);
        return view('landingpage.beranda', compact('departements', 'totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints', 'polls'));

        // return view('landingpage.beranda', compact('departements', 'totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints'));
    }

    public function getPolls()
    {
        // Mendapatkan data polling
        $polls = polls::all();

        return $polls;
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
