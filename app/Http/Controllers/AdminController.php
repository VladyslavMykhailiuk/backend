<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AdminController extends Controller
{
    public function index()
    {
        if(isset($_GET['_sp_token'])){
            $token = PersonalAccessToken::findToken($_GET['_sp_token']);
            if ($token) {
                $user = $token->tokenable;
                if ($user) {
                    Auth::login($user);
                }

            }
            return view('/admin/home');
        }
        else {
            return redirect('login');
        }
    }
}
