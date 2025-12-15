<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }



    public function client()
    {
        return view('dashboard.client');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function cv()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        return view('dashboard.cv', compact('experiences'));
    }



}
