<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class LoginController extends Controller
{
    public  function index(){
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return View('Login');
        }
    }

    public function do_login(Request $request)
    {
        $this->checkValidation($request);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin/loan');
        }else{
            return redirect('/admin/Login')->with('status','Incorrect Username or password !');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/Login');
    }

    //check validation function
    public function checkValidation($data)
    {
        $this->validate($data, [
            'username' => 'required|max:100',
            'password' => 'required|max:100',
        ]);
    }
}
