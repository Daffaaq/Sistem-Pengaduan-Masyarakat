<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Answercomplaints;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnswerComplaintRequest;

class AnswerComplaintfromAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmentId = Auth::user()->department_id;
        $answers = Answercomplaints::where('department_id', $departmentId)->get();
        return view('admin.answer_complaints.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // AnswerComplaintfromAdminController
    public function create($complaintId)
    {
        $complaint = Complaint::findOrFail($complaintId);

        // Check if the authenticated user has access to the complaint
        if (Auth::user()->department_id == $complaint->department_id) {
            $complaints = Complaint::where('department_id', $complaint->department_id)->get();
            return view('admin.complaints.create_answer', compact('complaint', 'complaints'));
        } else {
            abort(403); // Forbidden
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request, $complaintId)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'answer' => 'required|string',
    //     ]);

    //     $complaint = Complaint::findOrFail($complaintId);

    //     // Check if the authenticated user has access to the complaint
    //     if (Auth::user()->department_id == $complaint->department_id) {
    //         $answer = new Answercomplaints();
    //         $answer->answer = $request->input('answer');
    //         $answer->answer_complaint_date = now();
    //         $answer->department_id = $complaint->department_id;
    //         $answer->user_id = Auth::id();
    //         $answer->complaint_id = $complaintId;
    //         $answer->save();

    //         $complaint->status = 'resolved';
    //         $complaint->save();

    //         return redirect()->route('admin.complaints.index')->with('success', 'Answer created successfully.');
    //     } else {
    //         abort(403); // Forbidden
    //     }
    // }
    public function store(StoreAnswerComplaintRequest $request, $complaintId)
    {
        $complaint = Complaint::findOrFail($complaintId);

        // Check if the authenticated user has access to the complaint
        if (Auth::user()->department_id == $complaint->department_id) {
            $answer = new Answercomplaints();
            $answer->answer = $request->input('answer');
            $answer->answer_complaint_date = now();
            $answer->department_id = $complaint->department_id;
            $answer->user_id = Auth::id();
            $answer->complaint_id = $complaintId;
            $answer->save();

            $complaint->status = 'resolved';
            $complaint->save();

            return redirect()->route('admin.complaints.index')->with('success', 'Answer created successfully.');
        } else {
            abort(403); // Forbidden
        }
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
