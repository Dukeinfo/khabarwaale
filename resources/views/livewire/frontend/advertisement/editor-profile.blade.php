<div class="col-lg-12 mb-4">
    <div class="how2 how2-cl5 flex-sb-c m-b-35 mb-3 bg-white">
        <h3 class="f1-m-2 cl17 tab01-title">
            @if (session()->get('language') === 'hindi')
                  संपादक डेस्क
            @elseif (session()->get('language') === 'english')
                Editor's Desk
            @elseif (session()->get('language') === 'punjabi')
                    ਸੰਪਾਦਕ ਦਾ ਡੈਸਕ
            @elseif (session()->get('language') === 'urdu')
                ایڈیٹر کی میز
            @endif
        </h3>
    </div>
    <div class="card bg-white border-0">
        <div class="card-body">
            <div class="media align-items-center">
                <img src="{{ isset($reporterProfile->profile_photo_path ) ?  get_user_profile($reporterProfile->profile_photo_path): asset('no_image') }}" class="mr-3" width="90" alt="">
                <div class="media-body">
                    <h5 class="mt-0 text-dark font-weight-bold">{{  $reporterProfile->name ?? "NA"}}  </h5>
                    <p class="mb-3">{{  ucwords($reporterProfile->role->name ) ?? "NA"}} </p>
                    <p>
                        <a href="{{route('home.reporter_news')}}" target="_blank" class="btn btn-primary btn-sm px-3">

                            @if (session()->get('language') === 'hindi')
                            अधिक जाने 
                            @elseif (session()->get('language') === 'english')
                            Editor's Know More
                            @elseif (session()->get('language') === 'punjabi')
                            ਹੋਰ ਜਾਣੋ
                            @elseif (session()->get('language') === 'urdu')
                            زیادہ جانو
                            @endif
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>