<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Welcome page
    public function index(){
        $data = Array(
            "site_name" => config('app.name')
        );

        return view('pages.welcome')->with($data);
    }
}
