<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answercomplaints;
use App\Models\Complaint;
use App\Models\Departements;
use Illuminate\Support\Facades\Auth;

class AnsweComplaintstoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = $this->getUserComplaintsWithAnswers()->paginate(5); // Ganti 10 dengan jumlah item per halaman yang Anda inginkan

        return view('masyarakat.answer_complaints.index', compact('complaints'));
    }

    private function getUserComplaintsWithAnswers()
    {
        $userId = Auth::id();

        return Complaint::with('department', 'answerComplaint')
            ->where('user_id', $userId)
            ->whereHas('answerComplaint');
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
