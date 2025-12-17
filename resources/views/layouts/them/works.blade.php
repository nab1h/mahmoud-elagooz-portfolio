
<section id="works" class="s-works target-section">

            <div class="row">
                <div class="column xl-12">
                    <div class="section-header" data-num="02">
                        <h2 class="text-display-title">Selected Works.</h2>
                    </div> <!-- end section-header -->
                </div>
            </div>

            <div class="projects-wrapper">
                <div class="modern-card" ontouchstart="handleTouchStart(event)"
                    ontouchend="handleTouchEnd(event, this)">

                    <div class="card-visuals">
                        <button class="nav-btn prev" onclick="slide(this, -1)">&#10094;</button>
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}" class="active">
                        <img src="{{ asset('them/images/folio/caffeine_and_tulips.jpg') }}">
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}">
                        <button class="nav-btn next" onclick="slide(this, 1)">&#10095;</button>
                    </div>

                    <div class="card-content">
                        <div class="content-top">
                            <div class="brand-logo-container">
                                <img src="{{ asset('them/images/folio/white_turban@2x.jpg') }}">
                            </div>
                            <div class="text-stack">
                                <h3 class="project-name-display">Project Title</h3>
                                <span class="brand-name-display">Brand Name</span>
                            </div>
                        </div>
                        <p class="project-info-text">
                            النص هنا واضح ومريح للعين، والكرت بياخد وضعه في الشاشة.
                        </p>
                    </div>
                </div>
                <div class="modern-card" ontouchstart="handleTouchStart(event)"
                    ontouchend="handleTouchEnd(event, this)">

                    <div class="card-visuals">
                        <button class="nav-btn prev" onclick="slide(this, -1)">&#10094;</button>
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}" class="active">
                        <img src="{{ asset('them/images/folio/caffeine_and_tulips.jpg') }}">
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}">
                        <button class="nav-btn next" onclick="slide(this, 1)">&#10095;</button>
                    </div>

                    <div class="card-content">
                        <div class="content-top">
                            <div class="brand-logo-container">
                                <img src="{{ asset('them/images/folio/white_turban@2x.jpg') }}">
                            </div>
                            <div class="text-stack">
                                <h3 class="project-name-display">Project Title</h3>
                                <span class="brand-name-display">Brand Name</span>
                            </div>
                        </div>
                        <p class="project-info-text">
                            النص هنا واضح ومريح للعين، والكرت بياخد وضعه في الشاشة.
                        </p>
                    </div>
                </div>

                <div class="modern-card" ontouchstart="handleTouchStart(event)"
                    ontouchend="handleTouchEnd(event, this)">

                    <div class="card-visuals">
                        <button class="nav-btn prev" onclick="slide(this, -1)">&#10094;</button>
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}" class="active">
                        <img src="{{ asset('them/images/folio/caffeine_and_tulips.jpg') }}">
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}">
                        <button class="nav-btn next" onclick="slide(this, 1)">&#10095;</button>
                    </div>

                    <div class="card-content">
                        <div class="content-top">
                            <div class="brand-logo-container">
                                <img src="{{ asset('them/images/folio/white_turban@2x.jpg') }}">
                            </div>
                            <div class="text-stack">
                                <h3 class="project-name-display">Project Title</h3>
                                <span class="brand-name-display">Brand Name</span>
                            </div>
                        </div>
                        <p class="project-info-text">
                            النص هنا واضح ومريح للعين، والكرت بياخد وضعه في الشاشة.
                        </p>
                    </div>
                </div>
                <div class="modern-card" ontouchstart="handleTouchStart(event)"
                    ontouchend="handleTouchEnd(event, this)">

                    <div class="card-visuals">
                        <button class="nav-btn prev" onclick="slide(this, -1)">&#10094;</button>
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}" class="active">
                        <img src="{{ asset('them/images/folio/caffeine_and_tulips.jpg') }}">
                        <img src="{{ asset('them/images/folio/grayscale@2x.jpg') }}">
                        <button class="nav-btn next" onclick="slide(this, 1)">&#10095;</button>
                    </div>

                    <div class="card-content">
                        <div class="content-top">
                            <div class="brand-logo-container">
                                <img src="{{ asset('them/images/folio/white_turban@2x.jpg') }}">
                            </div>
                            <div class="text-stack">
                                <h3 class="project-name-display">Project Title</h3>
                                <span class="brand-name-display">Brand Name</span>
                            </div>
                        </div>
                        <p class="project-info-text">
                            النص هنا واضح ومريح للعين، والكرت بياخد وضعه في الشاشة.
                        </p>
                    </div>
                </div>
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
            </script>
            <div class="row s-testimonials">
                <div class="column xl-12">

                    <h3 class="s-testimonials__header">Hear it from My Happy Clients</h3>

                    <div class="swiper-container s-testimonials__slider">

                        <div class="swiper-wrapper">

                            <div class="s-testimonials__slide swiper-slide">
                                <div class="s-testimonials__author">
                                    <img src="images/avatars/user-02.jpg" alt="Author image"
                                        class="s-testimonials__avatar">
                                    <cite class="s-testimonials__cite">
                                        <strong>John Rockefeller</strong>
                                        <span>Standard Oil Co.</span>
                                    </cite>
                                </div>
                                <p>
                                    Molestiae incidunt consequatur quis ipsa autem nam sit enim magni. Voluptas tempore
                                    rem.
                                    Explicabo a quaerat sint autem dolore ducimus ut consequatur neque. Nisi dolores
                                    quaerat fuga rem nihil nostrum.
                                    Laudantium quia consequatur molestias.
                                </p>
                            </div> <!-- end s-testimonials__slide -->

                            <div class="s-testimonials__slide swiper-slide">
                                <div class="s-testimonials__author">
                                    <img src="images/avatars/user-03.jpg" alt="Author image"
                                        class="s-testimonials__avatar">
                                    <cite class="s-testimonials__cite">
                                        <strong>Andrew Carnegie</strong>
                                        <span>Carnegie Steel Co.</span>
                                    </cite>
                                </div>
                                <p>
                                    Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat
                                    voluptas animi adipisci.
                                    Nisi eaque consequatur. Voluptatem dignissimos ut ducimus accusantium perspiciatis.
                                    Quasi voluptas eius distinctio. Atque eos maxime.
                                </p>
                            </div> <!-- end s-testimonials__slide -->

                            <div class="s-testimonials__slide swiper-slide">
                                <div class="s-testimonials__author">
                                    <img src="images/avatars/user-01.jpg" alt="Author image"
                                        class="s-testimonials__avatar">
                                    <cite class="s-testimonials__cite">
                                        <strong>John Morgan</strong>
                                        <span>JP Morgan & Co.</span>
                                    </cite>
                                </div>
                                <p>
                                    Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea
                                    quia nesciunt. Ducimus aut sed ipsam.
                                    Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas
                                    eius distinctio.
                                    Voluptatem dignissimos ut.
                                </p>
                            </div> <!-- end s-testimonials__slide -->

                            <div class="s-testimonials__slide swiper-slide">
                                <div class="s-testimonials__author">
                                    <img src="images/avatars/user-06.jpg" alt="Author image"
                                        class="s-testimonials__avatar">
                                    <cite class="s-testimonials__cite">
                                        <strong>Henry Ford</strong>
                                        <span>Ford Motor Co.</span>
                                    </cite>
                                </div>
                                <p>
                                    Nunc interdum lacus sit amet orci. Vestibulum dapibus nunc ac augue. Fusce vel dui.
                                    In ac felis
                                    quis tortor malesuada pretium. Curabitur vestibulum aliquam leo. Qui sed at corrupti
                                    expedita voluptas odit.
                                    Nihil ea quia nesciunt. Ducimus aut sed ipsam.
                                </p>
                            </div> <!-- end s-testimonials__slide -->

                        </div> <!-- end swiper-wrapper -->

                        <div class="swiper-pagination"></div>

                    </div> <!-- end swiper-container -->

                </div> <!-- end column -->
            </div> <!-- end s-testimonials -->
        </section> <!-- end s-works -->
