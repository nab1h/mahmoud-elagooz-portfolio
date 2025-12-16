<?php

namespace App\Http\Controllers;
use App\Models\CvFile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CvFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function store(Request $request)
    {
        // 1. قواعد التحقق: ملف PDF مطلوب وحجم أقصى 5 ميجابايت
        $validated = $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120', 
        ]);

        if ($request->hasFile('cv_file')) {
            
            // 2. معالجة وحفظ الملف على السيرفر
            
            // إنشاء اسم فريد للملف باستخدام دالة time()
            $fileName = time() . '_' . $request->file('cv_file')->getClientOriginalName();
            
            // حفظ الملف في المسار: storage/app/public/cv_files
            // (هذا هو ملف الـ storage الداخلي)
            $request->file('cv_file')->storeAs('public/cv_files', $fileName);
            
            
            // 3. تحديث جدول قاعدة البيانات
            
            // بما أنك تريد ملف CV واحد، نحذف جميع السجلات القديمة
            CvFile::truncate();
            
            // إنشاء سجل جديد للملف
            CvFile::create([
                'file_name' => $fileName, // الاسم الذي تم حفظه على السيرفر
                'display_name' => $request->file('cv_file')->getClientOriginalName(), // الاسم الذي يراه المستخدم
            ]);
        }

        // 4. إعادة التوجيه
        return redirect()->route('experiences.index') 
            ->with('cv_success', 'تم رفع ملف السيرة الذاتية بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download()
    {
        $cvFile = CvFile::latest()->first();

        if (!$cvFile) {
            return redirect()->back()->with('error', 'لا يوجد ملف سيرة ذاتية مرفوع حالياً للتنزيل.');
        }

        $filePath = 'public/cv_files/' . $cvFile->file_name;
        
        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'الملف غير موجود على السيرفر.');
        }

        return Storage::download($filePath, $cvFile->display_name);
    }
}
