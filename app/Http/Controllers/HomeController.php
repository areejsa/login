<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;

        $user = User::where('id',$id)->first();
        // dd($user->name);

        $name=$user->name; 
        $email=$user->email; 

        // return view('home' ,compact('user'));
        return view('home' ,['name' => $name,'email' => $email]);

    }
}
