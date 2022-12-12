<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login
    public function login()
    {
       return 'login';
    }

    //logout
    public function logout()
    {
        return 'logout';
    }

    //refresh
    public function refresh()
    {
        return 'refresh';
    }

    //me
    public function me()
    {
        return 'me';
    }
}
