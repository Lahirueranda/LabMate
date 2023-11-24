<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables; 

class AdminController extends Controller
{


    public function getBookingsData(Request $request)
    {
        $todayData = $request->input('today_data');
    
        // Get all bookings for the specified date with user information
        $bookings = Booking::whereDate('start_time', $todayData)->with('user')->get();
    
        // Group the bookings by date and user
        $groupedBookings = $bookings->groupBy(function ($booking) {
            return date('Y/m/d', strtotime($booking->start_time)) . '_' . $booking->user->id;
        });
    
        $formattedBookings = [];
    
        foreach ($groupedBookings as $key => $bookingsForDateAndUser) {
            // Extract date and user id from the key
            [$date, $userId] = explode('_', $key);
    
            $timeSlots = $bookingsForDateAndUser->map(function ($booking) {
                return '<span class="badge badge-secondary">' . Carbon::parse($booking->start_time)->format('H:i') . ' - ' . Carbon::parse($booking->end_time)->format('H:i') . '</span>';
            })->implode('  ');
    
            // Get all user names for the date
            $userNames = $bookingsForDateAndUser->pluck('user.name')->unique()->implode(', ');
    
            $formattedBookings[] = [
                'date' => $date,
                'user_id' => $userId,
                'time_slots' => $timeSlots,
                'user_names' => $userNames,
                'action' => '',
                'cancel_url' => route('bookings.cancel', $bookingsForDateAndUser->first()->id),
            ];
        }
    
        return response()->json(['data' => $formattedBookings]);
    }
    



    public function showStudents()
    {
        return view('labs.students');
    }

    public function getStudentsData()
    {
        $students = User::get();

        return DataTables::of($students)
            ->addColumn('action', function ($student) {
                return '<button class="btn btn-sm btn-danger" onclick="deleteStudent(' . $student->id . ')">Delete</button>';
            })
            ->make(true);
    }

}

