<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    // Welcome page
    public function index(){
        $data = Array(
            "site_name" => config('app.name')
        );

        return view('pages.welcome')->with($data);

    }

    public function dashboard(){

        return view('dashboard');
    }
}
