<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profileData'] = Auth::user();
        return view('profile', $data);
    }

    public function updateUserProfile(UpdateUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $storeUser = User::where('id', Auth::user()->id)->update([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'dob' => $request->dob
            ]);

            if ($storeUser) {
                $fileName = '';
                if ($request->hasFile('profile_pic')) {
                    $oldFile = User::select('id','profile_pic')->where('id',  Auth::user()->id)->first()->profile_pic;

                    $fileName = 'user-' . time() . '.' . $request->profile_pic->extension();
                    $request->profile_pic->move($_SERVER['DOCUMENT_ROOT'] . '/assets/images/profile_pics', $fileName);

                    $fileName = 'images/profile_pics/' . $fileName;

                    User::where('id', Auth::user()->id)->update([
                        'profile_pic' => $fileName
                    ]);

                    if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/'. $oldFile)){
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/'. $oldFile);
                    }
                }

                DB::commit();
                return response()->json(['statusCode' => 200, 'message' => 'Successfully Updated', 'data' => true]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['statusCode' => 500, 'message' => 'Something Went Wrong!', 'error' => $e->getMessage()]);
        }
    }
}
