<?php

namespace App\Http\Controllers;
use App\Models\CvFile;
use App\Models\Award;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Http\Request;


class ExperiencesController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $cvFile = CvFile::latest()->first();
        $awards = Award::orderBy('date', 'desc')->get();
        $skills = Skill::orderBy('name', 'asc')->get();
        return view('experiences.index', compact('experiences', 'cvFile', 'awards', 'skills'));
    }
    public function create()
    {
        return view('experiences.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        Experience::create($validated);
        return redirect()->route('experiences.index')
            ->with('success', 'تم إضافة الخبرة بنجاح!');
    }
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }
    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        $experience->update($validated);
        return redirect()->route('experiences.index')
            ->with('success', 'تم تعديل الخبرة بنجاح!');
    }



    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')
            ->with('success', 'تم حذف الخبرة بنجاح.');
    }
}
