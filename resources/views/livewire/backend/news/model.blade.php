<div class="modal fade" id="exampleModal{{$record->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">News Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <h4> <span class="text-success "> User Name: </span>
                        <span class="text-primary "> {{$record->user['name'] ?? 'NA' }} </span>
                    </h4>
                    <h4> <span class="text-success ">Category (Menu): </span>
                        <span class="badge bg-dark p-1"> {{ $record->getmenu['category_en'] ?? 'NA'  }}</span>
                   </h4>
                   <h4> <span class="text-success">News Title :</span> </h4>
                   <p> {{ ucwords($record->title) ?? 'NA' }}  </p>
      
                  <h4> <span class="text-success">News Heading :</span> </h4>
                   <p> {{ ucwords($record->heading) ?? 'NA' }}  </p> 
      
      
      
                  <h4> <span class="text-success">News Type :</span>
                      {{ ucwords($record->newstype['name']) ?? 'NA' }}
                  </h4>
                  <h4> <span class="text-success">Pdf file :</span>
                            <a href="{{ isset($record->pdf_file )?  get_pdf($record->pdf_file)  : '' }}" download=""> {{ ucwords($record->pdf_file) ?? 'NA' }} </a>
                </h4>
                <h4> <span class="text-success"> Posted date:</span>
                    {{ \Carbon\Carbon::parse($record->post_date)->format('F j, Y') }}
                 </h4>
                  
                </div>
                <div class="col-md-6 border">
                    <h4> <span class="text-success">News Large Image :</span> </h4>

                    <img src="{{ isset($record->image) ? getNewsImage($record->image) : asset('no_image.jpg')}}" alt=".." class="img-fluid" >



                </div>
            </div>
     
         
   
        
      <hr>
        <div class="row">
            <div class="col-md-12">
                <h4> <span class="text-success">News Description :</span> </h4>
                <p> {!! ucwords($record->news_description) ?? 'NA' !!}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success"> Slider  :</span> </h6>
                <p> {{ ucwords($record->slider) ?? 'NA' }}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success"> Breaking top  :</span> </h6>
                <p> {{ ucwords($record->breaking_top) ?? 'NA' }}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success"> Breaking side  :</span> </h6>
                <p> {{ ucwords($record->breaking_side) ?? 'NA' }}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success"> Top stories  :</span> </h6>
                <p> {{ ucwords($record->top_stories) ?? 'NA' }}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success">  Gallery  :</span> </h6>
                <p> {{ ucwords($record->gallery) ?? 'NA' }}  </p> 
            </div>
            <div class="col-md-2">
                <h6> <span class="text-success"> More  :</span> </h6>
                <p> {{ ucwords($record->more) ?? 'NA' }}  </p> 
            </div>
        </div>
        </div>

    </div>
    </div>
</div>