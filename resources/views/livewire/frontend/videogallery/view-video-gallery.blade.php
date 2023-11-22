<section class="p-t-50">
    <div class="container">
        <div class="row">

            {{-- multiple row start  --}}
            @forelse ($videprecords  as $videprecord )
            <div class="col-sm-4 p-b-25">
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="p-b-30">
                                <div class="position-relative">
                                    <div class="wrap-pic-w pos-relative">
                                        {{-- isset($videprecord->video_image) ?  get_video_image($videprecord->video_image):  --}}
                                        <img src="{{ asset('assets/images/video-01.jpg')}}" alt="IMG">

                                        <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#video{{$videprecord->id}}">
                                            <span class="fab fa-youtube"></span>
                                        </button>
                                    </div>
                                    <div class="p-tb-16 p-rl-25 bg3">
                                        <h5 class="p-b-5">
                                            <a href="https://www.youtube.com/embed/{{$videprecord->video_url}}?rel=0" class="f1-m-3 cl0 hov-cl10 trans-03">
                                                <span class="rippleSpan"></span> Watch VIDEO
                                            </a>
                                        </h5>
                                        <span class="cl15">
                                            <span class="f1-s-3">
                                                Khabarwaale TV
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="">
                                    <a href="https://www.youtube.com/embed/{{$videprecord->video_url}}?rel=0" target="_blank" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!! Str::words($videprecord->video_title_en, 10, '...') ?? "NA" !!}

                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="https://www.youtube.com/embed/{{$videprecord->video_url}}?rel=0 target="_blank"" class="f1-s-4 cl10 hov-cl10 trans-03">
                                    {!! carbon\Carbon::parse($videprecord->created_at)->format('M d, Y') ?? "NA" !!}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- multiple row end  --}}
   
            <div class="modal fade" id="video{{$videprecord->id}}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">
                                {!! Str::words($videprecord->video_title_en, 10, '...') ?? "NA" !!}

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Responsive iframe container -->
                            <div class="iframe-container">
                                <!-- Embed YouTube video iframe -->
                                <iframe width="100%" height="420" src="https://www.youtube.com/embed/{{$videprecord->video_url}}?rel=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse

          

        </div>
    </div>
</section>