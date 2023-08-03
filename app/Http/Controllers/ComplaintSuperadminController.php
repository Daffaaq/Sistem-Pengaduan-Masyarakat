<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Departements;
use PDF;

class ComplaintSuperadminController extends Controller
{
    public function index(Request $request)
    {
        // Menginisialisasi query builder untuk model Complaint.
        $complaints = Complaint::query();
        
        // Memeriksa apakah request memiliki parameter 'department'.
        if ($request->has('department')) {
            $departmentId = $request->input('department'); // Jika ada, ambil nilai 'department' dari input request.

            // Memeriksa apakah nilai $departmentId ada (tidak kosong).
            if ($departmentId) {
                // Jika $departmentId tidak kosong, tambahkan kondisi WHERE ke query builder.
        // Kondisi WHERE akan menyaring data Complaint berdasarkan nilai 'department_id'.
        // Artinya, hanya Complaint dengan 'department_id' yang sesuai dengan nilai $departmentId yang akan ditampilkan.
                $complaints->where('department_id', $departmentId);
            }
        }

        $complaints = $complaints->paginate(5)->appends(request()->query());
        $departments = Departements::all();
        // $id = $departmentId;

        return view('superadmin.complaints.index', compact('complaints', 'departments'));
    }

    public function cetak_pdf(Request $request)
    {
        // Mengambil nilai dari parameter 'departmentId' dalam request query (misalnya, ?departmentId=123) dan menyimpannya dalam variabel $departmentId.
        $departmentId = $request->query('departmentId');
        // Membuat instance dari query builder untuk model Complaint.
        $complaints = Complaint::query();

        // Memeriksa apakah $departmentId ada (tidak null atau tidak kosong).
        if ($departmentId) {
            // Jika $departmentId memiliki nilai, tambahkan kondisi WHERE ke query builder $complaints.
            // Kondisi WHERE akan menyaring data Complaint berdasarkan nilai 'department_id'.
            $complaints->where('department_id', $departmentId);
        }

        // Mengambil hasil query dari model Complaint berdasarkan kondisi yang telah ditambahkan ke query builder.
        // Hasil query akan berupa koleksi (Collection) dari objek Complaint yang memenuhi kondisi.
        $complaints = $complaints->get();
        // Mengambil data Departements dari database berdasarkan nilai $departmentId.
        // Departements adalah sebuah tabel/model lain yang memiliki relasi dengan model Complaint.
        $department = Departements::find($departmentId);

        // Menyiapkan data yang akan digunakan dalam view cetak_pdf.
        // Data ini berisi koleksi Complaints dan data Departements yang telah diambil sebelumnya.
        $data = [
            'complaints' => $complaints,
            'department' => $department,
        ];

        // Membuat file PDF dari view 'superadmin.complaints.cetak_pdf' dengan menggunakan data yang telah disiapkan.
        $pdf = PDF::loadview('superadmin.complaints.cetak_pdf', $data);
        // Mengembalikan hasil file PDF sebagai response (stream).
        // Pengguna dapat melihat PDF tersebut langsung di browser tanpa perlu menyimpannya terlebih dahulu.
        return $pdf->stream();
    }
}
