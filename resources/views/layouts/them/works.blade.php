<section id="works" class="s-works target-section">

    <div class="row">
        <div class="column xl-12">
            <div class="section-header" data-num="02">
                <h2 class="text-display-title">Selected Works.</h2>
            </div> <!-- end section-header -->
        </div>
    </div>

    <div class="projects-wrapper">
        @foreach($projects as $project)
            <div class="modern-card" ontouchstart="handleTouchStart(event)" ontouchend="handleTouchEnd(event, this)">
                <div class="card-visuals">
                    <button class="nav-btn prev" onclick="slide(this, -1)">&#10094;</button>
                    <img src="{{ asset('storage/' . $project->photo_1) }}" alt="{{ $project->name }}" class="active">
                    <img src="{{ asset('storage/' . $project->photo_2) }}" alt="{{ $project->name }}">
                    <img src="{{ asset('storage/' . $project->photo_3) }}" alt="{{ $project->name }}">
                    <button class="nav-btn next" onclick="slide(this, 1)">&#10095;</button>
                </div>
                <div class="card-content">
                    <div class="content-top">
                        <div class="brand-logo-container">
                            <img src="{{ asset('storage/' . $project->photo_brand) }}" alt="{{ $project->brand_name }}">
                        </div>
                        <div class="text-stack">
                            <h3 class="project-name-display">{{ $project->name }}</h3>
                            <span class="brand-name-display">{{ $project->brand_name }}</span>
                        </div>
                    </div>
                    <p class="project-info-text">
                        {{ Str::limit($project->description, 100) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        let xDown = null;
        function handleTouchStart(evt) { xDown = evt.touches[0].clientX; }

        function handleTouchEnd(evt, card) {
            if (!xDown) return;
            let xUp = evt.changedTouches[0].clientX;
            let xDiff = xDown - xUp;
            if (Math.abs(xDiff) > 50) {
                slide(card.querySelector('.nav-btn'), xDiff > 0 ? 1 : -1);
            }
            xDown = null;
        }

        function slide(btn, dir) {
            const container = btn.parentElement;
            const imgs = container.querySelectorAll('img');
            let curr = Array.from(imgs).findIndex(i => i.classList.contains('active'));
            imgs[curr].classList.remove('active');
            curr = (curr + dir + imgs.length) % imgs.length;
            imgs[curr].classList.add('active');
        }

        function slide(btn, dir) {
            const container = btn.parentElement;
            const imgs = container.querySelectorAll('img');

            // 1. البحث عن الصورة الحالية
            let curr = Array.from(imgs).findIndex(i => i.classList.contains('active'));

            // 2. إزالة الكلاس النشط (سيبدأ تأثير الـ CSS في إخفائها بنعومة)
            imgs[curr].classList.remove('active');

            // 3. حساب الصورة التالية
            curr = (curr + dir + imgs.length) % imgs.length;

            // 4. إضافة الكلاس النشط للصورة الجديدة (ستظهر بنعومة)
            imgs[curr].classList.add('active');
        }

        // وظيفة لتشغيل السليدر تلقائياً
        function startAutoplay() {
            // نبحث عن كل أزرار "التالي" في الصفحة
            const nextButtons = document.querySelectorAll('.nav-btn.next');

            nextButtons.forEach(btn => {
                // نضبط موقتاً يعمل كل 4 ثواني (4000 ملي ثانية)
                setInterval(() => {
                    slide(btn, 1); // يستدعي وظيفة التغيير ناحية اليمين
                }, 3000);
            });
        }

        // تشغيل الوظيفة عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', startAutoplay);
    </script>
    <div class="row s-testimonials">
        <div class="column xl-12">

            <h3 class="s-testimonials__header">Hear it from My Happy Clients</h3>

            <div class="swiper-container s-testimonials__slider">

                <div class="swiper-wrapper">
                    {{-- نقوم بفلترة المجموعة لعرض العناصر التي تحتوي على star بقيمة 1 فقط --}}
                    @forelse ($testimonials->where('is_favorite', 1) as $testimonial)
                        <div class="s-testimonials__slide swiper-slide"
                            style="text-align: left; justify-content: flex-start;">
                            <div class="s-testimonials__author">
                                <cite class="s-testimonials__cite" style="text-align: left;">
                                    <strong style="display: block;">{{ $testimonial->name }}</strong>
                                    <span style="display: block;">{{ $testimonial->job_title ?: 'N/A' }}</span>
                                </cite>
                            </div>
                            <p>
                                {{ Str::limit($testimonial->message, 500) }}
                            </p>
                    </div> @empty
                        <div class="swiper-slide text-center">
                            <p>No featured testimonials found.</p>
                        </div>
                    @endforelse
                </div>
            </div> <!-- end swiper-wrapper -->
            <div class="swiper-pagination"></div>
        </div> <!-- end swiper-container -->
    </div> <!-- end column -->
    </div> <!-- end s-testimonials -->
</section> <!-- end s-works -->