<?php

// namespace App\Http\Controllers;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class Homecontroller extends Controller
// {
//     public function redirect(){
//         if(Auth::id()){
//           if(Auth::user()->usertype=='0'){
//             return view('user.home');
        
//         }

//         else{
//             return view('admin.home');
//         }
//       }  else
//     {
//         return redirect()->back();
//     }
// }
// }



namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {  
            switch (Auth::user()->usertype) {
                case '0':
                    
                    $doctor = Doctor::all();  
                    return view('user.home', compact('doctor'));
    
                case '3':
                    
                    return view('doctor.home'); 
    
                case '1':
                    
                    return view('admin.home'); 
    
                default:
                    
                    return redirect('login'); 
            }
        } else {
            
            return redirect('login');
        }
    }
    

        public function index()
        {
            if(Auth::id())
            {
                return redirect('home');
            }else{

                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }


        }

        public function appointment(Request $request)
        {

            $request->validate([
                    'name' => 'required',
                    'email' => 'required', 
                    'date' => 'required',
                    'phone' => 'required',
                    'message' => 'required',
                    'doctor' => 'required',
                    
                 ]);
            $data = new Appointment;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->date=$request->date;
            $data->phone=$request->number;
            $data->message=$request->message;
            $data->doctor=$request->doctor;
            $data->status='In progress';
            if(Auth::id())
            {

                $data->user_id=Auth::user()->id;
            }
            $data->save();
            return redirect()->back()->with('message','Appointment Request Successful. We will contact with you soon.');
        }



        public function myappointment()
        {
            if(Auth::id())
            {

                if(Auth::user()->usertype==0)
                {

                      
                $userid = Auth::user()->id;
                $appoint=Appointment::where('user_id',$userid)->get();

                return view('user.my_appointment',compact('appoint'));

                }else{
                    return redirect()->back();

                }

           }
            else
            {

                return redirect()->back();
            }

        }

        public function cancel_appoint($id)
        {
            $data = Appointment::find($id);
            $data->delete();
            return redirect()->back();

        }

}
