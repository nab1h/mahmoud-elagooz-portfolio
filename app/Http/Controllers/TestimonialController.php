<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // عرض قائمة آراء العملاء

    // عرض نموذج إضافة رأي جديد
    public function create()
    {
        return view('statistics.testimonialscreate');
    }

    // حفظ الرأي الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        $validated['is_favorite'] = $request->has('is_favorite');

        Testimonial::create($validated);

        return redirect()->route('statistics.index')
            ->with('success', 'تم إضافة رأي العميل بنجاح.');
    }
    public function edit(Testimonial $testimonial)
    {
        return view('statistics.testimonialsedit', compact('testimonial'));
    }

    // حفظ التعديلات
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        $validated['is_favorite'] = $request->has('is_favorite');

        $testimonial->update($validated);

        return redirect()->route('statistics.index')
            ->with('success', 'تم تعديل رأي العميل بنجاح.');
    }

    // حذف الرأي
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('statistics.index')
            ->with('success', 'تم حذف رأي العميل بنجاح.');
    }
}