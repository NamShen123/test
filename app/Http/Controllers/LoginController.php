<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    //
    public function display(){
        return view("loginView");
    }
    
    public function login(Request $request){

        
        $checkInfo = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('username', '=', $username)->first();


        if (!$user){
            return response()->json([
                'status' => "USER_NOT_FOUND",
                'message' => "Tài khoản hoặc mật khẩu sai"
            ]);
        }

        if (Hash::check($password, $user->password)){
            return response()->json([
                'status' => "SUCCESS",
                'message' => "Đăng nhập thành công"
            ]);
        }
        return response()->json([
            'status' => "USER_NOT_FOUND",
            'message' => "Sai mật khẩu",
        ]);
    }
}
