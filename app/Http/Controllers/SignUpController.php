<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends BaseController
{
    //
    public function display(){
        return view("SignUpView");
    }
    
    public function store(Request $request){

        // TODO: UNIQUE username
        $username = $request->input('username');
        $username_exist = User::where('username', $username)->first();
        if($username_exist){
            return response()->json([
                'status'=> 'ERROR',
                'message'=> 'Tài khoản này đã có người sử dụng!'
            ]);
        }
        
        // TODO: UNIQUE email
        $email = $request->input('email');
        $email_exist = User::where('email', $email)->first();
        if($email_exist){
            return response()->json([
                'status'=>'ERROR',
                'message'=>'Email này đã có người sử dụng!'
            ]);
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return response()->json([
                'status'=>'ERROR',
                'message'=>'Email không hợp lệ'
            ]);
        }

        // TODO: password
        $password = $request->input('password');
        $retypePassword = $request->input('retypePassword');
        if($password != $retypePassword or $password == ''){
            return response()->json([
                'status'=>'ERROR',
                'message'=>'Mật khẩu nhập lại không trùng khớp hoặc chưa điền!'
            ]);
        }

        // TODO: name
        $name = trim($request->input('name'));
        if (!$this->validate_name($name)){
            return response()->json([
                'status'=>'ERROR',
                'message'=>'Tên chỉ được chứa chữ và khoảng trắng ở giữa'
            ]);
        }
        
        // TODO: address
        $address = $request->input('address');        

        // TODO: phone
        $phone = $request->input('phone');
        if (!$this->validate_number($phone)){
            return response()->json([
                'stauts'=>'ERROR',
                'message'=>'Số điện thoại không hợp lệ!'
            ]);
        }

        // TODO: store

        $user = new User;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->name = $name;
        $user->address = $address;
        $user->phone = $phone;
        $user->email = $email;
        $roleStudent = Role::where('role_name', Role::ROLE_STUDENT)->first();
        $user->role_id = $roleStudent->id;
        $user->save();

        return response()->json([
            'status'=> 'SUCCESS',
            'message'=> 'Đăng ký thành công'
        ]);
    }

    public function validate_number($phoneNumber){
        if(preg_match('/^(\+*)[0-9]{9,12}$/', $phoneNumber)){
            // check phone number having 9-12 digits and startwith + or not
            return true;
        }
        return false;
    }

    public function validate_name($name){
        if(preg_match('/^[ a-zA-z]+$/', $name)){
            return true;
        }
        return false;
    }
}
