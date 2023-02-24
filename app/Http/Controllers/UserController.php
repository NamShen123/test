<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class UserController extends BaseController
{
    //
    public function showAll(){
        $users = User::all();
        return response()->json($users);
    }

    public function showById($id){
        $user = User::find($id);
        return response()->json($user);
    }
}
