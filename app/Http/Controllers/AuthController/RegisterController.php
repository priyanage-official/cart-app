<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Jobs\ProcessRegisterMail;
use App\Mail\RegisterMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerUser(StoreUserRequest $request){

        try {
            DB::beginTransaction();
            $fileName = '';
            if($request->hasFile('profile_pic')){
                $fileName = 'user-' . time() . '.' . $request->profile_pic->extension();
                $request->profile_pic->move($_SERVER['DOCUMENT_ROOT'] . '/assets/images/profile_pics', $fileName);
                
                $fileName = 'images/profile_pics/' . $fileName;
            }
            
            $storeUser = User::create([
                'fullname' => $request->fullname,
                'email_id' => $request->email_id,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'dob' => $request->dob,
                'profile_pic' => $fileName,
                'role_id' => $request->role_name
            ]);

            if($storeUser){
                DB::commit();
                dispatch(new ProcessRegisterMail($request->fullname,$request->email_id));
                return response()->json(['statusCode' => 200, 'message' => 'Successfully Created', 'data' => $storeUser->fullname]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['statusCode' => 500, 'message' => 'Something Went Wrong!', 'error' => $e->getMessage()]);
        }
    }
}
