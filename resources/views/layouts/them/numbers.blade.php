<section id="numbers" class="s-numbers">
    <div class="row counter-items">
        @forelse ($statistics as $stat)
            <div class="column counter-items__item">
                <div class="num">
                    {{ $stat->value }}
                    <span>+</span>
                </div>
                <h5>{{ $stat->title }}</h5>
                <p>
                    {{ Str::limit($stat->description, 505) }}
                </p>
            </div> <!-- end counter-items__item -->
        @empty
            <tr>
                <td colspan="5" class="text-center">No statistics found.</td>
            </tr>
        @endforelse
    </div> <!-- end counter-items -->
</section> <!-- end s-numbers -->