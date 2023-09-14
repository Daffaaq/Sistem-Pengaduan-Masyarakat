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
use Illuminate\Support\Facades\Log;

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
        try {
            // Memulai blok try untuk menangani potensi kesalahan

            $file = $request->file('file');
            // Mengambil file yang diunggah melalui permintaan HTTP

            if (!$file) {
                // Memeriksa apakah tidak ada file yang dipilih oleh pengguna
                return redirect()->back()->with('error', 'No file selected.');
                // Mengarahkan kembali pengguna dengan pesan kesalahan jika tidak ada file yang dipilih
            }

            $import = new DepartementImport();
            // Membuat instance dari kelas DepartementImport

            Excel::import($import, $file);
            // Mengimpor data dari file Excel menggunakan instance DepartementImport

            return redirect()->route('superadmin.departement.index')->with('success', 'Departements imported successfully.');
            // Mengarahkan pengguna ke rute 'superadmin.departement.index' dengan pesan sukses jika impor berhasil

        } catch (\Throwable $e) {
            // Menangani kesalahan jika ada

            \Log::error('Error during import: ' . $e->getMessage());
            // Mencatat pesan kesalahan ke dalam log

            \Log::error('Stack trace: ' . $e->getTraceAsString());
            // Mencatat tumpukan jejak kesalahan ke dalam log

            return redirect()->back()->with('error', 'An error occurred while importing: ' . $e->getMessage());
            // Mengarahkan kembali pengguna dengan pesan kesalahan jika terjadi kesalahan selama impor
        }
    }

}
