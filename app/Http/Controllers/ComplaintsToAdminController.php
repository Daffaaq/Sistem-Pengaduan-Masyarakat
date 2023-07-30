<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View; // Import View facade

class ComplaintsToAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $departmentId = Auth::user()->department_id;

        // Mendapatkan daftar pengaduan dengan departemen yang sesuai
        $complaints = Complaint::where('department_id', $departmentId)->get();

        // Render the view and pass the $complaints variable to it
        return view('admin.complaints.index', compact('complaints'));
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

    public function showDetailAjax($id)
    {
        // Temukan pengaduan berdasarkan ID
        $complaint = Complaint::findOrFail($id);

        // Return response as JSON
        return response()->json([
            'complaint' => $complaint,
            'images' => $complaint->images, // Include image data in the response
        ]);
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
    public function updateStatus(Request $request, $complaintId)
    {
        // Temukan pengaduan berdasarkan ID
        $complaint = Complaint::findOrFail($complaintId);

        // Validasi data yang dikirim melalui permintaan
        $request->validate([
            'status' => 'required|in:pending,in progress',
        ]);

        // Perbarui status pengaduan
        $complaint->status = $request->status;
        $complaint->save();

        return redirect()->route('admin.complaints.index')->with('success', 'Status updated successfully.');
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
