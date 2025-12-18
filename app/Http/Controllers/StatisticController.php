<?php

namespace App\Http\Controllers;
use App\Models\Statistic;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('id', 'asc')->get();
        $testimonials = Testimonial::orderBy('is_favorite', 'desc')->orderBy('id', 'desc')->get();
        return view('statistics.index', compact('statistics', 'testimonials'));
    }
    public function create()
    {
        return view('statistics.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);
        Statistic::create($validated);
        return redirect()->route('statistics.index')
            ->with('success', 'تم إضافة الإحصائية بنجاح!');
    }
    public function edit(Statistic $statistic)
    {
        return view('statistics.edit', compact('statistic'));
    }
    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);
        $statistic->update($validated);
        return redirect()->route('statistics.index')
            ->with('success', 'تم تعديل الإحصائية بنجاح!');
    }
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('statistics.index')
            ->with('success', 'تم حذف الإحصائية بنجاح.');
    }
}
