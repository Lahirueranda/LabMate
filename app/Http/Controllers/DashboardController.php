<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //


    public function dashboard()
    {




        $labId = auth()->user()->lab->id;
        $users = User::where('lab_id', $labId)->get();


        if (Auth::user()->isAdmin()) {
        return view('labs.dashboard_admin', compact('users'));
        } else {
            return view('labs.dashboard_student');
        }
    }
}
