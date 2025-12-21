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
        $projects = Project::latest()->get();
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

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'job_title' => 'nullable|string|max:255',
        ]);

        Testimonial::create([
            'name' => $data['name'],
            'message' => $data['message'],
            'job_title' => $data['job_title'] ?? 'Client',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم الإرسال بنجاح'
        ]);
    }


}
