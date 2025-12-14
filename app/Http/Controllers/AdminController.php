<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function linkes()
    {
        return view('dashboard.linkes');
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
        return view('dashboard.cv');
    }

    public function projects()
    {
        return view('dashboard.projects');
    }

}
