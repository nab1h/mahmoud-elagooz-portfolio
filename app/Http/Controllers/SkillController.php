<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // دالة store - حفظ المهارة الجديدة
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

    // دالة edit - عرض نموذج التعديل (يمكن أن تعيد التوجيه لصفحة تعديل منفصلة أو تستخدم AJAX)
   public function edit(Skill $skill)
{
    // عرض واجهة التعديل مع تمرير كائن المهارة
    return view('experiences.skillsedit', compact('skill'));
}

// دالة update - حفظ التعديلات
public function update(Request $request, Skill $skill)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'level' => 'nullable|integer|min:0|max:100',
    ]);

    $skill->update($validated);

    // إعادة التوجيه إلى صفحة إدارة الخبرات الرئيسية مع رسالة نجاح
    return redirect()->route('experiences.index')
        ->with('skill_success', 'تم تعديل المهارة بنجاح!');
}

    // دالة destroy - حذف المهارة
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('experiences.index')
            ->with('skill_success', 'تم حذف المهارة بنجاح.');
    }
}