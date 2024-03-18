<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
        <div class="wrap-video-mo-01">
            <div class="video-mo-01">
                @if (Route::currentRouteName() === 'home.archive_page')
                @if(isset($archiveVideos))
                <iframe src="https://www.youtube.com/embed/{{$archiveVideos->video_url}}?rel=0" allowfullscreen></iframe>
                 @else
                    <p>
                        Sorry, there is currently no live TV news available. Please check back later for updates.
                    </p>            
                @endif
                @else
                @if(isset($livetvnews))
                <iframe src="https://www.youtube.com/embed/{{$livetvnews->video_url}}?rel=0" allowfullscreen></iframe>
                 @else
                    <p>
                        Sorry, there is currently no live TV news available. Please check back later for updates.
                    </p>            
                @endif
                @endif
                
               
            </div>
        </div>
    </div>
</div>