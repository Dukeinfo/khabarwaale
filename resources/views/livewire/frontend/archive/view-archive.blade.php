<div class="p-b-37">
    <div class="how2 how2-cl5 flex-s-c bg-white">
        <h3 class="f1-m-2 cl17 tab01-title">
            Archive
        </h3>
    </div>

    {{-- <ul class="p-t-32">
        @forelse ($archive_News as $news)
        <li class="p-rl-4 p-b-19">
            <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                <span>
                    {{ $news->post_month }}
                </span>
                <span>
                    ({{ $news->count }})
                </span>
            </a>
        </li>
    @empty
        <!-- Handle the case where there are no news articles -->
    @endforelse
    </ul> --}}


        <ul class="p-t-32">
            @foreach ($monthlyCounts as $monthlyCount)
        <li class="p-rl-4 p-b-19">
            <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                <span>
                    {{Carbon\Carbon::create()->month($monthlyCount->month)->format('F') ?? '' }} {{ $monthlyCount->year  ?? ''}} 
                </span>
                <span>
                    ({{ $monthlyCount->count ?? '' }})
                </span>
            </a>
        </li>
        @endforeach
    </ul>


</div>