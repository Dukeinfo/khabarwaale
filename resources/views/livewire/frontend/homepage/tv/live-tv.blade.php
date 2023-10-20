<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
        <div class="wrap-video-mo-01">
            <div class="video-mo-01">
                @if(isset($livetvnews))
                <iframe src="{{$livetvnews->video_url }}" allowfullscreen></iframe>
               @else
               {{-- <iframe src="https://www.youtube.com/embed/rMVarSeBOrI?rel=0" allowfullscreen></iframe> --}}
            
                @endif
            </div>
        </div>
    </div>
</div>