<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('dashboard.index', compact('settings'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'home' => 'nullable|string',
            'about' => 'nullable|string',
            'footer' => 'nullable|string',
        ]);
        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return redirect()->route('settings.index')
            ->with('success', 'تم تحديث المحتوى بنجاح!');
    }
}

