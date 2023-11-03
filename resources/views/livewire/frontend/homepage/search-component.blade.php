



<div class="pos-relative size-a-2 bo-1-rad-22 of- bocl11 m-tb-6">
    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="search" name="search" placeholder="Search" wire:model.live="search">
    <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
        <i class="zmdi zmdi-search"></i>
    </button>
    <ul class="results bg-white " >
        @if (!empty($search))
        @foreach($posts as $key => $post)
        <li class="text-danger"><a href="{{route('home.inner',['newsid' => $post->id , 'slug' =>  $post->slug  ])}}">  
            ({{$key+1}})  
            {!! Str::limit(  $post->title, 25)!!} 
        </a></li>
        @endforeach

                @if (session()->get('language') == "hindi" )
                     <li class='text-danger text-center'>कोई परिणाम नहीं मिला</li>
                @endif
                @if (session()->get('language') == "english" )
                     <li class="text-danger text-center">No Results Found</li>
                @endif
                @if (session()->get('language') == "punjabi" )
                     <li class="text-danger text-center">ਕੋਈ ਨਤੀਜੇ ਨਹੀਂ ਮਿਲੇ</li>
                @endif
                @if (session()->get('language') == "urdu" )
                     <li class="text-danger text-center">  کوئی نتیجہ نہیں</li>
                @endif
        @endif
     
    </ul>
</div>
