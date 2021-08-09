<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =Auth::user();
        $check = $this->checkIfUserHasSoulMate();
        if($user->admin == 0) {

            return view('home')
                ->with('check',$check)
                ->with('user',$user);
        }
        else {
            return redirect('/admin-panel');
        }
    }


    public function checkIfUserHasSoulMate()
    {
        $users = User::all();
        $user =Auth::user();
        foreach ($users as $soul)
        {
            if ($soul->id != $user->id && $soul->admin == 0)
            {
                if ( strcmp($soul->soul_mate_location,$user->country) )
                {
                    return true;
                }
            }
        }
    }
}
