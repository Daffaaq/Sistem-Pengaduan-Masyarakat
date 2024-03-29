<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Departements;
use App\Models\Images;
use App\Models\Tickets;
use App\Http\Requests\StoreComplaintRequest;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Response; // Tambahkan ini pada bagian atas file controller

class ComplaintsFromUserController extends Controller
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

        // Get all complaints created by the authenticated user
        $complaints = Complaint::where('user_id', $userId)->paginate(5)->appends(request()->except(['page', '_token']));

        return view('masyarakat.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $departments = Departements::all();
        $departments = Departements::whereHas('users', function ($query) {
        $query->where('role', 'admin');
        })->get();
        return view('masyarakat.complaints.create-complaints', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'department_id' => 'required|exists:departements,id',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar, boleh nullable.
    //     ]);

    //     // Create the complaint
    //     $complaint = new Complaint();
    //     $complaint->user_id = Auth::id();
    //     $complaint->title = $request->input('title');
    //     $complaint->complaint_date = now();
    //     $complaint->description = $request->input('description');
    //     $complaint->status = 'pending';
    //     $complaint->department_id = $request->input('department_id');
    //     $complaint->save();
    //     // Jika ada gambar yang diunggah, simpan gambar
    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         $imagePath = $request->file('image')->store('complaint_images', 'public');

    //         // Create a new image instance and attach to the complaint
    //         $image = new Images(); // Use your Images model
    //         $image->complaint_id = $complaint->id;
    //         $image->image_path = $imagePath;
    //         $image->save();
    //     }

    //     return redirect()->route('user.complaints.index')->with('success', 'Complaint created successfully.');
    // }
    public function store(StoreComplaintRequest $request)
    {
        // Request data is already validated by StoreComplaintRequest
        // No need to manually call $request->validate()

        // Check for duplicate complaints
        $existingComplaint = Complaint::where('user_id', Auth::id()) // Memeriksa complaint yang sudah ada dengan user yang sedang login
            ->whereRaw('LOWER(title) = ?', [strtolower($request->input('title'))]) // Memeriksa judul complaint secara case-insensitive
            ->where('complaint_date', now()->toDateString()) // Memeriksa complaint yang dibuat pada tanggal yang sama
            ->where('department_id', $request->input('department_id')) // Memeriksa complaint pada departemen yang sama
            ->first(); // Mengambil complaint pertama yang sesuai dengan kriteria di atas

        if ($existingComplaint) {
            // Duplicate complaint found, return an error response
            return response()->json([
                'success' => false,
                'error' => 'Duplicate complaint. You have already submitted a complaint with the same title and date today.'
            ]); // Mengembalikan respon JSON yang berisi pesan kesalahan karena complaint duplikat
        }


        // Create the complaint
        $complaint = new Complaint();
        $complaint->user_id = Auth::id();
        $complaint->title = $request->input('title');
        $complaint->time = now()->toTimeString();
        $complaint->complaint_date = now();
        $complaint->description = $request->input('description');
        $complaint->status = 'pending';
        $complaint->department_id = $request->input('department_id');
        $complaint->longitude = $request->input('longitude'); // Save longitude if provided
        $complaint->latitude = $request->input('latitude');   // Save latitude if provided
        $complaint->save();

        // Create a new ticket using the createTicket() method
        $ticket = $complaint->createTicket();

        // Jika ada gambar yang diunggah, simpan gambar
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('complaint_images', 'public');

            // Create a new image instance and attach to the complaint
            $image = new Images(); // Use your Images model
            $image->complaint_id = $complaint->id;
            $image->image_path = $imagePath;
            $image->save();
        }

        // return response()->json(['success' => true]);
        return Response::json(['success' => true]);
        // return redirect()->route('user.complaints.index')->with('success', 'Complaint created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the complaint by ID
        $complaint = Complaint::with('images')->findOrFail($id);
        // return $complaint;
    
        return view('masyarakat.complaints.detail-complaints', compact('complaint'));
    }


    public function details($id)
    {
        $complaint = Complaint::with('department', 'images')->findOrFail($id);
        return response()->json($complaint);
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
