<div class="p-b-37">
    <div class="how2 how2-cl5 flex-s-c bg-white"  data-toggle="modal" data-target="#showEnterCodeModal">
        <h3 class="f1-m-2 cl17 tab01-title" >
            Archive
        </h3>
    </div>

    {{-- <ul class="p-t-32">
        @forelse ($archive_News as $news)
        <li class="p-rl-4 p-b-19">
            <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                <span>
                    {{ $news->post_month }}
                </span>
                <span>
                    ({{ $news->count }})
                </span>
            </a>
        </li>
    @empty
        <!-- Handle the case where there are no news articles -->
    @endforelse
    </ul> --}}


        <ul class="p-t-32">
            @foreach ($monthlyCounts as $monthlyCount)
                <li class="p-rl-4 p-b-19">
                    <a target="_blank" href="{{ route('home.archive', ['id' => $monthlyCount->month,
                    'slug' => Carbon\Carbon::create()->month($monthlyCount->month)->format('F'),
                    'year' => $monthlyCount->year]) }}" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                        <span>
                            {{ Carbon\Carbon::create()->month($monthlyCount->month)->format('F') ?? '' }} {{ $monthlyCount->year ?? '' }}
                        </span>
                        <span>
                            ({{ $monthlyCount->count ?? '' }})
                        </span>
                    </a>
                </li>
            @endforeach
        
    </ul>


    <div wire.ignore class="modal fade" id="monthCategoryModal" tabindex="-1" role="dialog" aria-labelledby="monthCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthCategoryModalLabel">Select Month and  Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{-- <form wire:submit.prevent="submitArchive">
                            <div class="form-group">
                                <label for="fromDate">From Date:</label>
                                <input type="date" class="form-control" id="fromDate" wire:model='fromDate'>
                            </div>
                            
                            <div class="form-group">
                                <label for="toDate">To Date:</label>
                                <input type="date" class="form-control" id="toDate" wire:model='toDate'>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="categorySelect">Select Category:</label>
                                <select class="form-control" id="categorySelect" wire:model='categorySelect'>
                                    @foreach ($getCategory as $calVal)
                                    <option value="{{$calVal->id}}">{{$calVal->category_en}}</option>
                                    <!-- Add options for other categories -->
                                @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>

                        </form> --}}
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                    <!-- Add any other buttons if needed -->
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <script>
        document.addEventListener('livewire:initialized', () => {
            $('#monthCategoryModal form').on('submit', function(event) {
                Livewire.dispatch('submitArchive'); // Emit Livewire event on form submission
                $('#monthCategoryModal').modal('hide'); // Hide the modal after submission
                event.preventDefault(); // Prevent the form from submitting traditionally
            });
            
            $('#openModalLink').click(function(event) {
                event.preventDefault(); // Prevent the default behavior of the link
                $('#monthCategoryModal').modal('show'); // Show the modal
            });
        });


        
    </script> --}}
    <div>
 
        <div  class="modal fade" tabindex="-1" id="showEnterCodeModal" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-mobile bg-success"></em>
                            <h4 class="nk-modal-title">  Select Month and  Category </h4>
                            <form wire:submit.prevent="submitArchive">
    
                                <div class="form-group">
                                    <label for="fromDate">From Date:</label>
                                    <input type="date" class="form-control" id="fromDate" wire:model='fromDate'>
                                </div>
                                
                                <div class="form-group">
                                    <label for="toDate">To Date:</label>
                                    <input type="date" class="form-control" id="toDate" wire:model='toDate'>
                                </div>
                                <div class="form-group">
                                    <label for="categorySelect">Select Category:</label>
                                    <select class="form-control" id="categorySelect" wire:model='categorySelect'>
                                        @foreach ($getCategory as $calVal)
                                        <option value="{{$calVal->id}}">{{$calVal->category_en}}</option>
                                        <!-- Add options for other categories -->
                                    @endforeach
                                    </select>
                                </div>

                                <div class="nk-modal-action">
                                    <button type="submit" class="btn btn-dim btn-outline-primary"> Submit </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- .modal-body -->
                    
                </div>
            </div>
        </div>
    </div>
    @section('custom_scripts')
        <script>
            $(document).ready(function(){
                $("#showEnterCodeModal").on('hidden.bs.modal', function(){
                    Livewire.on('onCloseModal', function() {
                       $('#showEnterCodeModal').modal('hide'); 
                      // Hide the modal after submission
                });
            });

            });
        </script>
    @endsection
    
</div>