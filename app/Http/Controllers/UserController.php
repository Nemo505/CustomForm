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

            return view('users.form', $user);

        }else{

            return redirect()->route('users')->with(['error' => 'Admin  successfully created']);
        }

    }

    public function storeForm(  )
    {
        # code...
    }
}
