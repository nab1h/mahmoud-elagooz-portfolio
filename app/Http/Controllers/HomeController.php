<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\CvFile;
use App\Models\Experience;
use App\Models\Link;
use App\Models\project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Statistic;
use App\Models\Testimonial;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $projects = project::latest()->get();
        $experiences = Experience::all();
        $skills = Skill::all();
        $statistics = Statistic::all();
        $testimonials = Testimonial::all();
        $awards = Award::all();
        $links = Link::all();
        $cvFile = CvFile::latest()->first();
        return view('hero', compact(
            'settings',
            'projects',
            'experiences',
            'skills',
            'statistics',
            'testimonials',
            'awards',
            'links',
            'cvFile'
        ));
    }
}
