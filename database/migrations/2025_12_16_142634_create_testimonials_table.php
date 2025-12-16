<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم العميل
            $table->string('job_title')->nullable(); // وظيفة العميل (اختياري)
            $table->text('message'); // رسالة التقييم
            $table->boolean('is_favorite')->default(false); // لتحديد ما إذا كانت الرسالة مفضلة/مميزة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
