<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\helpers;
use Validator;

class UserApiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'information' => 'required|array|min:1',
        ]);

        if($validator->fails()) {
            return apiResponse('Validation Error', $validator->errors()->all(), 422);

        }else{
            $user = User::find(Auth::user()->id);

            $name = in_array('name', $request->information, true);
            $phone = in_array('phone', $request->information, true);
            $dob = in_array('dob', $request->information, true);
            $gender = in_array('gender', $request->information, true);

            if ($user) {
                $user->update([
                    'name' => $name ? 'pending' : null,
                    'phone' => $phone ? 'pending' : null,
                    'date_of_birth' => $dob ? '1111-11-11' : null,
                    'gender' => $gender ? 'pending' : null,
                ]);
                return apiResponse('Information selection Success', $user , 200);
            }else{
                return apiResponse('User Not found!', null, 404);
            }
        }
    }


    public function storeForm(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
       
        if ($user) {
            $user->update([
                'name' => $request->name ?? null,
                'phone' => $request->phone ?? null,
                'date_of_birth' =>   date("Y-m-d", strtotime($request->dob)) ?? null,
                'gender' => $request->gender ?? null,
            ]);
            return apiResponse('Information Updated Success', $user , 200);
        }else{
            return apiResponse('User Not found!', null, 404);
        }
    }
}
