<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|integer|min:0|max:100', // مستوى من 0 إلى 100
        ]);
        Skill::create($validated);

        return redirect()->route('experiences.index')
            ->with('skill_success', 'تم إضافة المهارة بنجاح!');
    }
    public function edit(Skill $skill)
    {
        return view('experiences.skillsedit', compact('skill'));
    }
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|integer|min:0|max:100',
        ]);

        $skill->update($validated);

        return redirect()->route('experiences.index')
            ->with('skill_success', 'تم تعديل المهارة بنجاح!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('experiences.index')
            ->with('skill_success', 'تم حذف المهارة بنجاح.');
    }
}