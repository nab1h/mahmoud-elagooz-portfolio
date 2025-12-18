<?php

namespace App\Http\Controllers;
use App\Models\CvFile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CvFileController extends Controller
{

    public function store(Request $request)
    {

        $validated = $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('cv_file')) {

            $fileName = time() . '_' . $request->file('cv_file')->getClientOriginalName();

            $request->file('cv_file')->storeAs('public/cv_files', $fileName);

            CvFile::truncate();

            CvFile::create([
                'file_name' => $fileName,
                'display_name' => $request->file('cv_file')->getClientOriginalName(),
            ]);
        }

        return redirect()->route('experiences.index')
            ->with('cv_success', 'تم رفع ملف السيرة الذاتية بنجاح!');
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
