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
                <img src="{{asset('assets/images/editor.png')}}" class="mr-3" width="90" alt="">
                <div class="media-body">
                    <h5 class="mt-0 text-dark font-weight-bold">Parminder Singh Jatpuri</h5>
                    <p class="mb-3">Editor</p>
                    <p>
                        <a href="javascript:void()" class="btn btn-primary btn-sm px-3">Know More </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>