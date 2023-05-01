<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\User;

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
       
        if ($user) {
            $user->update([
                'name' => $request->name ?? null,
                'phone' => $request->phone ?? null,
                'date_of_birth' =>   date("Y-m-d", strtotime($request->dob)) ?? null,
                'gender' => $request->gender ?? null,
            ]);
            return redirect()->route('users')->with(['success' => 'Form submitted successfully']);
        }else{
            return redirect()->route('users')->with(['error' => 'User Data not found']);
        }
    }
}
