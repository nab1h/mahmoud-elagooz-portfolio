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
        return view('linkes.index',compact('links'));
    }

// في LinkesController.php

// في LinkesController.php

public function update(Request $request)
    {
        // 1. قواعد التحقق (Validation) - تسمح بقيم فارغة لكنها تتطلب صيغة URL صحيحة إذا تم إدخال قيمة
        $validated = $request->validate([
            'facebook_url'  => 'nullable|max:255',
            'twitter_url'   => 'nullable|max:255',
            'instagram_url' => 'nullable|max:255',
            'pintrest_url'  => 'nullable|max:255',
            'wepsite_url'   => 'nullable|max:255',
            'linkedin_url'  => 'nullable|max:255',
            'phone_url'  => 'nullable|max:11',
        ]);

        $linkMap = [
            'facebook_url'  => 'facebook',
            'twitter_url'   => 'twiter',  
            'instagram_url' => 'instagram',
            'pintrest_url'  => 'pintrest',
            'wepsite_url'   => 'wepsite', 
            'linkedin_url'  => 'linkedin',
            'phone_url'  => 'phone',
        ];

        // 3. التحديث باستخدام updateOrCreate
        foreach ($validated as $field => $url) {
            if (isset($linkMap[$field])) {
                $platformName = $linkMap[$field];
                
                // updateOrCreate: تقوم بالبحث باستخدام 'name' وتحديث/إنشاء 'url'
                Link::updateOrCreate(
                    ['name' => $platformName], // شروط البحث
                    ['url' => $url]           // البيانات للتحديث/الإنشاء
                );
            }
        }

        // 4. إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.linkes')
            ->with('success', 'تم تحديث روابط التواصل بنجاح!');
    }
}