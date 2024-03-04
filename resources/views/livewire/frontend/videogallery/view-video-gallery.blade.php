<section class="p-t-50">
    <div class="container">
        <div class="row">
            {{-- Loop through each video record --}}
            @forelse ($videprecords as $videprecord)
                <div class="col-md-4 mb-4">
                    <div class="video-container">
                        <!-- Embed YouTube video using iframe -->
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$videprecord->video_url}}?rel=0" frameborder="0" allowfullscreen></iframe>
                      
                    </div>
                    <div class="video-info">
                        <div class="card">
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
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="https://www.youtube.com/watch?v={{$videprecord->video_url}}" title="{{$videprecord->video_title_en ?? ''}}" target="_blank">
                                        {!! Str::words($videprecord->video_title_en, 8, '...') ?? "NA" !!}
                                    </a>
                                </h5>
                           
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Published on {{ Carbon\Carbon::parse($videprecord->created_at)->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No videos found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
