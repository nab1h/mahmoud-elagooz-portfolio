<?php

namespace App\Http\Controllers;
use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LinkesController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('linkes.index', compact('links'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'facebook_url' => 'nullable|max:255',
            'twitter_url' => 'nullable|max:255',
            'instagram_url' => 'nullable|max:255',
            'pintrest_url' => 'nullable|max:255',
            'wepsite_url' => 'nullable|max:255',
            'linkedin_url' => 'nullable|max:255',
            'phone_url' => 'nullable|max:11',
        ]);
        $linkMap = [
            'facebook_url' => 'facebook',
            'twitter_url' => 'twiter',
            'instagram_url' => 'instagram',
            'pintrest_url' => 'pintrest',
            'wepsite_url' => 'wepsite',
            'linkedin_url' => 'linkedin',
            'phone_url' => 'phone',
        ];
        foreach ($validated as $field => $url) {
            if (isset($linkMap[$field])) {
                $platformName = $linkMap[$field];

                Link::updateOrCreate(
                    ['name' => $platformName],
                    ['url' => $url]
                );
            }
        }
        return redirect()->route('admin.linkes')
            ->with('success', 'تم تحديث روابط التواصل بنجاح!');
    }
}