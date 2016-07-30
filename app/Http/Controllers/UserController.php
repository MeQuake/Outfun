<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
    * Return user view with user specified by name
    *
    * @param string $name
    * @return Response
    **/

    public function getUserByName($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return view('user.index', ['user' => $user]);
    }
}
