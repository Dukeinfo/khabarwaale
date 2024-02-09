<div class="p-b-37">
    <div class="how2 how2-cl5 flex-s-c bg-white" id="openModalLink">
        <h3 class="f1-m-2 cl17 tab01-title"   >
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
                <a href="#"  class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                    <span>
                        {{Carbon\Carbon::create()->month($monthlyCount->month)->format('F') ?? '' }} {{ $monthlyCount->year  ?? ''}} 
                    </span>
                    <span>
                        ({{ $monthlyCount->count ?? '' }})
                    </span>
                </a>
            </li>
         @endforeach
    </ul>
    <div class="modal fade" id="monthCategoryModal" tabindex="-1" role="dialog" aria-labelledby="monthCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthCategoryModalLabel">Select Month and  Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form wire:submit.prevent="submitArchive">
                    <div class="form-group">
                        <label for="monthSelect">Select Month:</label>
                        <select class="form-control" id="monthSelect" wire:model='monthSelect'>
                            @foreach ($monthlyCounts as $monthlyCount)
                            <option value="{{$monthlyCount->month}}"> {{Carbon\Carbon::create()->month($monthlyCount->month)->format('F') ?? '' }} {{ $monthlyCount->year  ?? ''}} </option>
                            <!-- Add options for other months -->
                        @endforeach

                        </select>
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

                </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                    <!-- Add any other buttons if needed -->
                </div> --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Function to handle click event on the link
            $('#openModalLink').click(function(event) {
                event.preventDefault(); // Prevent the default behavior of the link
                $('#monthCategoryModal').modal('show'); // Show the modal
            });
        });
    </script>
</div>