<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function store(Request $request){

        if ($request->users) {
            
            $name = in_array('name', $request->users, true);
            $phone = in_array('phone', $request->users, true);
            $dob = in_array('dob', $request->users, true);
            $gender = in_array('gender', $request->users, true);
    
            $user = User::Create([
                'name' => $name ? 'pending' : null,
                'phone' => $phone ? 'pending' : null,
                'date_of_birth' => $dob ? '1111-11-11' : null,
                'gender' => $gender ? 'pending' : null,
            ]);

            return view('users.form', ['user' => $user]);

        }else{

            return redirect()->route('users')->with(['error' => 'Please Choose one to submit']);
        }

    }

    public function storeForm( Request $request )
    {
        $user = User::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users')->with(['error' =>  $validator->errors()->all()]);
        }
        if ($user) {
            $user->update([
                'name' => $request->name ?? null,
                'phone' => $request->phone ?? null,
                'date_of_birth' =>   date("Y-m-d", strtotime($request->dob)) ?? null,
                'gender' => $request->gender ?? null,               
                'email' => $request->email,
            ]);

            if ($this->informEmail($request->email, $user)) {
                return redirect()->route('users')->with(['success' => 'Success!, I have sent you the email']);
            } else {
                return redirect()->route('users')->with(['error' => 'Failed to send the mail']);
            }

        }else{
            return redirect()->route('users')->with(['error' => 'User Data not found']);
        }
    }


    private function informEmail($email, $user){

        $user = User::where('email', $email)->first();
               
        \Mail::to($email)->send(new \App\Mail\sendMail($user));
        
        return true;
    }
}
