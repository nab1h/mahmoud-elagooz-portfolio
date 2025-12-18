<?php

namespace App\Http\Controllers;
use App\Models\Award;

use Illuminate\Http\Request;

class AwardController extends Controller
{

    public function index()
    {
        //
    }
    public function create()
    {

        return redirect()->route('experiences.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);
        Award::create($validated);
        return redirect()->route('experiences.index')
            ->with('award_success', 'تم إضافة الجائزة بنجاح!');
    }
    public function edit(Award $award)
    {
        return view('experiences.awardsedit', compact('award'));
    }
    public function update(Request $request, Award $award)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date' => 'required|date_format:Y-m-d',
        ]);
        $award->update($validated);
        return redirect()->route('experiences.index')
            ->with('award_success', 'تم تعديل الجائزة بنجاح!');
    }
    public function destroy(Award $award)
    {
        $award->delete();
        return redirect()->route('experiences.index')
            ->with('award_success', 'تم حذف الجائزة بنجاح.');
    }
}
