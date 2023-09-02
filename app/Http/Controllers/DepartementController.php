<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departements;
use App\Http\Requests\DepartementRequest;
use App\Http\Requests\UpdateDepartementRequest;
use Illuminate\Support\Facades\Validator;
use App\Imports\DepartementImport; // Import the DepartementImport class
use Illuminate\Support\Facades\File; // Import the File facade
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departements::all();
        return view('superadmin.departements.index', compact('departements'));
    }

    public function create()
    {
        return view('superadmin.departements.tambah-departements');
    }

    // public function store(Request $request)
    // {
    //     // Validate the input data
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|unique:departements,name', // Ensure that 'name' is unique in the 'departements' table
    //         'longitude' => 'nullable',
    //         'latitude' => 'nullable',
    //     ]);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     // Validation passed, create the department
    //     Departements::create([
    //         'name' => $request->name,
    //         'longitude' => $request->longitude,
    //         'latitude' => $request->latitude,
    //     ]);

    //     return redirect()->route('superadmin.departement.index')->with('success', 'Departement created successfully.');
    // }



    public function store(DepartementRequest $request)
{
    $validatedData = $request->validated();

    // Convert the newline-delimited tasks string into an array
    $tasksArray = explode("\r\n", $validatedData['tugas']);
    
    // Convert the tasks array into a JSON string
    $tasksJson = json_encode($tasksArray);

    Departements::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'link_website' => $validatedData['link_website'],
        'longitude' => $validatedData['longitude'],
        'latitude' => $validatedData['latitude'],
        'tugas' => $tasksJson, // Save the tasks as a JSON string
    ]);

    return redirect()->route('superadmin.departement.index')->with('success', 'Departement created successfully.');
}


    
    public function edit($id)
    {
        $departement = Departements::findOrFail($id);
        return view('superadmin.departements.edit-departements', compact('departement'));
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //     ]);

    //     $departement = Departements::findOrFail($id);
    //     $departement->update($request->only('name'));

    //     return redirect()->route('superadmin.departement.index')->with('success', 'Departement updated successfully.');
    // }
    public function update(UpdateDepartementRequest $request, $id)
    {
        $departement = Departements::findOrFail($id);
        $departement->update($request->validated());

        return redirect()->route('superadmin.departement.index')->with('success', 'Departement updated successfully.');
    }

    public function destroy($id)
    {
        $departement = Departements::findOrFail($id);
        $departement->delete();

        return redirect()->route('superadmin.departement.index')->with('success', 'Departement deleted successfully.');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        if ($file) {
            // Simpan file sementara
            $tempFilePath = $file->storeAs('temp', $file->getClientOriginalName(), 'public');

            // Proses impor
            $import = new DepartementImport();
            Excel::import($import, storage_path('app/public/' . $tempFilePath));

            // Hapus file sementara setelah impor selesai
            File::delete(storage_path('app/public/' . $tempFilePath));

            return redirect()->route('superadmin.departement.index')->with('success', 'Departements imported successfully.');
        }

        return redirect()->back()->with('error', 'No file selected.');
    }

}
