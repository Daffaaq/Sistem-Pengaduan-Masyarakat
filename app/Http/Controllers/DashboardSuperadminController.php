<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class DashboardSuperadminController extends Controller
{
    public function index()
    {
        // Mendapatkan jumlah total complaints
        $totalComplaints = Complaint::count();

        // Mendapatkan jumlah complaints dengan status pending
        $pendingComplaints = Complaint::where('status', 'pending')->count();

        // Mendapatkan jumlah complaints dengan status in progress
        $inProgressComplaints = Complaint::where('status', 'in progress')->count();

        // Mendapatkan jumlah complaints dengan status resolved
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();

        // Memanggil LandingPageController dan fungsi getPolls() untuk mendapatkan data polling
        $landingPageController = new LandingPageController();
        $polls = $landingPageController->getPolls();

        // Hitung total likes dan dislikes dari seluruh data polling
        $totalLikes = $polls->sum('likes');
        $totalDislikes = $polls->sum('dislikes');

        // Meneruskan data polling ke view 'superadmin.layouts.master'
        return view('superadmin.dashboard_superadmin.index', compact('polls', 'totalLikes', 'totalDislikes', 'totalComplaints', 'pendingComplaints', 'inProgressComplaints', 'resolvedComplaints'));
    }
}
