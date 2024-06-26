<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function __construct(ProductService $pservices)
    {
        $this->pservices = $pservices;
    }

    public function index()
    {
        return redirect('/');
    }

    public function loginUser(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = User::where('username', $request->username)->with('roles')->first();
                $request->session()->put('user', $user);
                $request->session()->put('role_type', $user->roles->role_type);
                $request->session()->put('cart', $this->pservices->getUserCart());
                $redirectTo = '/';
                if($user->roles->role_type == 'admin'){
                    $redirectTo = '/dashboard';
                }
                $request->session()->regenerate();
                return response()->json(['statusCode' => 200, 'message' => 'Successfully Logged In!', 'redirectTo' => $redirectTo]);
            } else {
                return response()->json(['statusCode' => 403, 'message' => 'Wrong Email Or Password!']);
            }
        } catch (Exception $e) {
            return response()->json(['statusCode' => 500, 'message' => 'Something Went Wrong!', 'error' => $e->getMessage()]);
        }
    }

    public function logoutUser(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
