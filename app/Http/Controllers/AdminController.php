<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

use Illuminate\Support\Facades\Notification as NotificationFacade;

class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {

            if(Auth::user()->usertype==1){

                return view('admin.add_doctor');

            }else{

                return redirect()->back();
            }
        }
        else{

            return redirect('login');
        }


    }

    public function upload(Request $request)
    {
        $doctor = new Doctor;
        $image =$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    // public function showappointmentt()
    // {
    //     if (Auth::check() && Auth::user()->usertype == 3) {
    //         $data = Appointment::all();
    //         return view('admin.showappointment', compact('data'));
    //     } else {
    //         return redirect('login');
    //     }
    // }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();

    }

    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();

    }

    public function showdoctor()
    {

        $data = Doctor::all();


          /////////////
          if(Auth::id())
          {

              if(Auth::user()->usertype==1){

                return view('admin.showdoctor', compact('data'));

              }else{

                  return redirect()->back();
              }
          }
          else{

              return redirect('login');
          }

          //////////////

    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back();

    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if($image)
        {


        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->save();
        return redirect()->back()->with('message','Doctor Details updated Successfully');

       }


    }

    public function emailview($id)
    {
        $data = Appointment::find($id);

        return view('admin.email_view',compact('data'));

    }

    public function sendemail(Request $request,$id)
    {

        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
             'body' => $request->body,
             'actiontext' => $request->actiontext,
             'actionurl' => $request->actionurl,
             'endpart' => $request->endpart

        ];

        NotificationFacade::send($data, new SendEmailNotification($details));

      return redirect()->back()->with('message','Email Successfully Sent');

    }



}
