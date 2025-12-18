<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_brand' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000', // 2MB
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedPaths = [];
        $imageFields = ['photo_brand', 'photo_1', 'photo_2', 'photo_3'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('projects', 'public');
                $uploadedPaths[$field] = $path;
            } else {
                $uploadedPaths[$field] = null;
            }
        }
        $projectData = array_merge($validatedData, $uploadedPaths);
        $project = Project::create($projectData);

        return redirect()->route('projects.index')
            ->with('success', 'تم إضافة المشروع بنجاح إلى البورتفوليو!');
    }
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_brand' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        $dataToUpdate = $validatedData;
        $imageFields = ['photo_brand', 'photo_1', 'photo_2', 'photo_3'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                if ($project->{$field}) {
                    Storage::disk('public')->delete($project->{$field});
                }
                $path = $request->file($field)->store('projects', 'public');
                $dataToUpdate[$field] = $path;
            }
        }
        $project->update($dataToUpdate);
        return redirect()->route('projects.index')
            ->with('success', 'تم تحديث المشروع بنجاح!');
    }
    public function destroy(Request $request, Project $project)
    {
        $imageFields = ['photo_brand', 'photo_1', 'photo_2', 'photo_3'];
        foreach ($imageFields as $field) {
            if ($project->{$field}) {
                Storage::disk('public')->delete($project->{$field});
            }
        }
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'تم حذف المشروع بنجاح!');
    }
}

