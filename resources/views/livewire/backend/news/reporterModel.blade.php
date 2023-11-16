<div class="modal fade" id="reporterModal{{$reporter_news->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">News Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5">
                    <h4> <span class="text-success"> Posted date:</span>
                        {{ \Carbon\Carbon::parse($reporter_news->created_at)->format('F j, Y') }}
                     </h4>
                   <h4> <span class="text-success">News Title :</span> </h4>
                   <p> {{ ucwords($reporter_news->title) ?? 'NA' }}  </p>
                  <h4> <span class="text-success">News Heading :</span> </h4>
                   <p> {{ ucwords($reporter_news->heading) ?? 'NA' }}  </p> 
                  <h4> <span class="text-success">Pdf file :</span>
                        <a href="{{ isset($reporter_news->pdf_file )?  get_pdf($reporter_news->pdf_file)  : '' }}" download=""> {{ ucwords($reporter_news->pdf_file) ?? 'NA' }} </a>
                </h4>
                </div>
                <div class="col-md-4 border">
                    <h4> <span class="text-success">News Large Image :</span> </h4>
                    <img src="{{ isset($reporter_news->image) ? getNewsImage($reporter_news->image) : asset('no_image.jpg')}}" alt=".." class="img-fluid " width="300px" >
                </div>
                {{-- ========== --}}
                <div class="col-md-3 ">
                    <h4> <span class="text-success">Locations :</span></h4>
                   
                    <ol>
                        <li>Slider  :  <span class="badge bg-success p-1"> {{ ucwords($reporter_news->slider) ?? '' }}</span> </li>
                        <li>Breaking top  : <span class="badge bg-success p-1"> {{ ucwords($reporter_news->breaking_top) ?? '' }}</span> </li>
                        <li> Breaking side : <span class="badge bg-success p-1"> {{ ucwords($reporter_news->breaking_side) ?? '' }}</span> </li>
                        <li>Top stories : <span class="badge bg-success p-1"> {{ ucwords($reporter_news->top_stories) ?? '' }}</span> </li>
                        <li>Gallery : <span class="badge bg-success p-1"> {{ ucwords($reporter_news->gallery) ?? '' }}</span></li>
                        <li>More : <span class="badge bg-success p-1"> {{ ucwords($reporter_news->more) ?? '' }}</span> </li>


                    </ol>
                </div>

            </div>
     
        <div class="row">
            <div class="col-md-12">
                <h4> <span class="text-success">News Description :</span> </h4>
                <p> {!! ucwords($reporter_news->news_description) ?? 'NA' !!}  </p> 
 
                {{-- {{ Str::of(strip_tags($reporter_news->news_description))->limit(50)}} --}}
            </div>
            
         

        </div>
        </div>

    </div>
    </div>
</div>