



<div class="pos-relative size-a-2 bo-1-rad-22 of- bocl11 m-tb-6">
    <style>
        .search-keywordResults{
                display: block;
                background: white;
                /* padding: 0px 10px 0px 10px; */
                border-radius: 10px;
                text-align: left;
                position: relative;
                text-transform: capitalize;
                margin: 0 auto 20px;
                width: 100%;
                position: relative;
                z-index: 999; 
             
                }
    </style>
    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="search" name="search" placeholder="Search" wire:model.live="search">
    <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
        <i class="zmdi zmdi-search"></i>
    </button>
    <div class="form-group search-keywordResults">
        <div id="TypeSuggestions" class="suggestions">
        <ul class="results bg-white">
            @if (!empty($search))
                @forelse($posts as $key => $post)
                    <li class="list-group-item ">
                        <a class="text-primary"  href="{{ route('home.inner', ['newsid' => $post->id, 'slug' => $post->slug]) }}">
                            ({{ $key + 1 }}) {!! Str::limit($post->title, 35) !!}
                        </a>
                    </li>
                @empty
                    @php
                        $language = session()->get('language');
                    @endphp
                        <li class='list-group-item text-danger text-center '>
                    @if ($language == "hindi")
                            कोई परिणाम नहीं मिला
                    @elseif ($language == "english")
                            No Results Found
                    @elseif ($language == "punjabi")
                            ਕੋਈ ਨਤੀਜੇ ਨਹੀਂ ਮਿਲੇ
                    @elseif ($language == "urdu")
                       کوئی نتیجہ نہیں</li>
                    @endif
                @endforelse
            @endif
        </ul>
         </div>
    </div>
</div>
