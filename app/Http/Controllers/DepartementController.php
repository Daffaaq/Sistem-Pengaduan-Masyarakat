<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departements;
use App\Http\Requests\DepartementRequest;
use Illuminate\Support\Facades\Validator;

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
        Departements::create($request->validated());
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
    public function update(DepartementRequest $request, $id)
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
}
