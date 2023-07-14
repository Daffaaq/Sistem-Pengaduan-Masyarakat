<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departements;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Departements::create($data);

        return redirect()->route('superadmin.departement.index')->with('success', 'Departement created successfully.');
    }

    public function edit($id)
    {
        $departement = Departements::findOrFail($id);
        return view('superadmin.departements.edit-departements', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $departement = Departements::findOrFail($id);
        $departement->update($data);

        return redirect('/dashboard_superadmin/departement')->with('success', 'Departement updated successfully.');
    }

    public function destroy($id)
    {
        $departement = Departements::findOrFail($id);
        $departement->delete();

        return redirect()->route('superadmin.departement.index')->with('success', 'Departement deleted successfully.');
    }
}
