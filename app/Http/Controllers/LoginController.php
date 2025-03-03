<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients_retail;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userID = clients_retail::where('username', $username)
        ->first()
        ->value('id');

        $passwordDB = clients_retail::where('id', $userID)
        ->first()
        ->value('password');

        if(password_verify($password, $passwordDB))
        {
            // success, proceed
            $request->session()->put('userID', $userID);
            return redirect()->route('accountHome');
        }
        else
        {
            // fail, report
            echo "wrong username/password";
        }
    }
}
