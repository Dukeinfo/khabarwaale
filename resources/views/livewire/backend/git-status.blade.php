<div>
    <div class="row">
<div class="col-md-8">
    <h3>Static page list</h3>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
         
                @foreach(Route::getRoutes() as $route)
                @if (str_starts_with($route->getName(), 'home.') )
                    @php
                         $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                     @endphp
                <tr>     
                    <td  class="fw-bold">  {{ str_replace('_' , ' ',$routeName)}} </td>
                     <td> 
                     @if(in_array($route->getName(), ['home.homepage' ,'home.inner'])) 
                    
                     <a class="fw-bold"href="{{ route($route->getName()) }}" target="_blank">  {{ str_replace('_' , ' ',$routeName)}}</a>
                    
                     @else
                            {{-- <a href="{{route('page_content')}}" target="_blank" > New page  </a> --}}
        
                     @endif
                        
                    
                     </td>
                </tr>
                    @endif
                @endforeach

                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4"> <h3>Last Activity</h3>
    <pre>{{ $lastActivity }}</pre>
    <button wire:click="updateLastActivity" class="btn   btn-success">Refresh Last Activity</button></div>
</div>

</div>
