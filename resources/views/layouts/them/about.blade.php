<section id="about" class="s-about target-section" >
    <div class="row s-about__content">
        <div class="column xl-12">
            <div class="section-header" data-num="01">
                <h2 class="text-display-title">About Me.</h2>
            </div> <!-- end section-header -->
            <p class="attention-getter">
                {{ $settings['about'] ?? '' }}
            </p>
            <br>
            <br>
            <br>
            <br>
            <div class="grid-list-items s-about__blocks">

                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Experience</h4>
                    <ul class="s-about__list">
                        @foreach ($experiences as $experience)
                            <li>
                                {{ $experience->company ?? '' }}
                                <span>{{ $experience->title ?? '' }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div> <!--end s-about__block -->
                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Awards</h4>
                    <ul class="s-about__list">
                        @forelse ($awards as $award)
                            <li>
                                <a href="#0">
                                    {{ $award->name }}
                                    <span>{{ $award->issuer ?: 'N/A' }}</span>
                                </a>
                            </li>
                        @empty
                            <li>
                                <td colspan="5" class="text-center">No awards found.</td>
                            </li>
                        @endforelse
                    </ul>
                </div> <!--end s-about__block -->
                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Skills</h4>

                    <ul class="s-about__list">
                        @forelse ($skills as $skill)
                            <li>
                                {{ $skill->name }}
                            </li>
                        @empty
                            <li>
                                <td colspan="4" class="text-center">No skills found.</td>
                            </li>
                        @endforelse
                    </ul>
                </div> <!--end s-about__block -->
            </div> <!-- grid-list-items -->
        </div> <!--end column -->
    </div> <!--end s-about__content -->
</section> <!-- end s-about -->