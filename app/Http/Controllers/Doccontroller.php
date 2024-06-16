<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Doccontroller extends Controller
{

    public function showappointment()
    {
        if (Auth::check() && Auth::user()->usertype == 3) {
            $data = Appointment::all();
            return view('doctor.showappointment', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
{
    if (Auth::check() && Auth::user()->usertype == 3) {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'Approved';
            $appointment->save();
        }
    }
    return redirect()->back();
}

public function canceled($id)
{
    if (Auth::check() && Auth::user()->usertype == 3) {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'Canceled';
            $appointment->save();
        }
    }
    return redirect()->back();
}




    // public function showdoctor()
    // {
    //     Log::info('Checking user authentication status');

    //     if (!Auth::check()) {
    //         Log::info('User is not authenticated');
    //         return redirect('login');
    //     }

    //     Log::info('User authenticated, checking user type');

    //     if (Auth::user()->usertype == 3) {
    //         $doctors = Doctor::all();
    //         Log::info('User is a doctor');
    //         return view('doctor.showdoctor', compact('doctors'));
    //     } else {
    //         if (Auth::user()->usertype == 1) {
    //             Log::info('User is an admin');
    //             return redirect()->route('admin.home');
    //         } else {
    //             Log::info('User is neither admin nor doctor');
    //             return redirect()->route('home');
    //         }
    //     }
    // }

    public function emailview($id)
    {
        $data = Appointment::find($id);

        return view('doctor.email_view', compact('data'));
    }
}
