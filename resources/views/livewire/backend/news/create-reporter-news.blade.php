<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    Oops!   {{ session('error') }}
                       
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-header bg-transparent border-bottom py-3">
                    <h4 class="card-title">Add Reporter  News</h4>
                    <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                </div>
                <div class="card-body">
           
      

                 <form  wire:submit.prevent="createReporterNews">
                    <div class="row">
                            <div class="col-md-4 mb-3">
                                <!-- News Type -->
                                <div class="form-group">
                                    <label for="news_type">News Type</label>
                                    <select name="news_type" wire:model="news_type" id="news_type" class="form-control" >
                                        <option value=""> Select type</option>
                                        @forelse ($getwebsite_type as $type )

                                            <option value="{{$type->websiteType->id }}">{{$type->websiteType->name ?? "NA"}} {{$type->websiteType->id}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('news_type') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <!-- Category ID -->
                                <div class="form-group">
                                    <label for="category_id">Category </label>
                                    <select name="category_id" wire:model="category_id" id="category_id" class="form-control">
                                            <option value=""> Select type</option>
                                            @forelse ($getCategory as $category )
                                                <option value="{{$category->category_id}}">{{ getMenuName($category->category_id) ?? "NA"}} {{$category->category_id}}</option>
                                            @empty
                                            @endforelse
                                    </select>
                                    @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                


                            <div class="col-md-6 mb-6">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" wire:model="title" id="title">
                                    @error('title') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-6">
                                <!-- Heading -->
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control" wire:model="heading" id="heading">
                                    @error('heading') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <!-- Heading2 -->
                                <div class="form-group">
                                    <label for="heading2">Heading2</label>
                                    <input type="text" class="form-control" wire:model="heading2" id="heading2">
                                    @error('heading2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" wire:model="image" id="image">
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <!-- Caption -->
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" class="form-control" wire:model="caption" id="caption">
                                    @error('caption') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <!-- PDF File -->
                                <div class="form-group">
                                    <label for="pdf_file">PDF File</label>
                                    <input type="file" class="form-control" wire:model="pdf_file" id="pdf_file">
                                    @error('pdf_file') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

  
          
                            <div class="col-md-12">
                                <div class="mb-3" >
                                    <label class="form-label"> News Description</label>
                                    <div wire:ignore>
                                          <textarea id="editor" wire:model="news_description" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                                     </div>
                                     @error('news_description') <span class="error">{{ $message }}</span> @enderror
                                 </div>
                            </div>

                            <!-- Slider -->
                            <div class="col-md-4 mb-3">
                                    <div class="form-check ">
                                        <input wire:model="slider" value="Show" class="form-check-input border border-dark"  type="checkbox"  id="slider">
                                        <label class="form-check-label" for="slider">Slider</label>
                                        @error('slider') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Breaking Top -->
                                    <div class="form-check">
                                        <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_top"  value="Show" id="breaking_top">
                                        <label class="form-check-label" for="breaking_top">Breaking Top</label>
                                        @error('breaking_top') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Breaking Side -->
                                    <div class="form-check">
                                        <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_side" value="Show" id="breaking_side">
                                        <label class="form-check-label" for="breaking_side">Breaking Side</label>
                                        @error('breaking_side') <span class="error">{{ $message }}</span> @enderror

                                    </div>

                                    <!-- Top Stories -->
                                    <div class="form-check">
                                        <input class="form-check-input border border-dark" type="checkbox" wire:model="top_stories" value="Show" id="top_stories">
                                        <label class="form-check-label" for="top_stories">Top Stories</label>
                                        @error('top_stories') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <!-- Gallery -->
                                <div class="form-check">
                                    <input class="form-check-input border border-dark" type="checkbox" wire:model="gallery" value="Show" id="gallery">
                                    <label class="form-check-label" for="gallery">Gallery</label>
                                    @error('gallery') <span class="error">{{ $message }}</span> @enderror
                                </div>
                    
                                <!-- More -->
                                <div class="form-check">
                                    <input class="form-check-input border border-dark" type="checkbox" wire:model="more" value="Show" id="more">
                                    <label class="form-check-label" for="more">More</label>
                                    @error('more') <span class="error">{{ $message }}</span> @enderror
                                </div>
                    
                                <!-- Send Notification -->
                                <div class="form-check">
                                    <input class="form-check-input border border-dark" type="checkbox" wire:model="send_noti" value="Show" id="send_noti">
                                    <label class="form-check-label" for="send_noti">Send Notification</label>
                                    @error('send_noti') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Metatags -->
                                <div class="form-group">
                                    <label for="metatags">Metatags</label>
                                    <textarea class="form-control border border-dark"  wire:model="metatags" id="metatags" rows="3"></textarea>
                                    @error('metatags') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control border border-dark" wire:model="description" id="description" rows="3"></textarea>
                                </div>
                                @error('description') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12">
                                <!-- Keywords -->
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control border border-dark" wire:model="keywords" id="keywords" rows="3"></textarea>
                                </div>
                                @error('keywords') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                     

                            <div class="col-md-4">
                                <!-- Post Date -->
                                <div class="form-group">
                                    <label for="post_date">Post Date</label>
                                    <input type="date" class="form-control" wire:model="post_date" id="post_date">
                                </div>
                                @error('post_date') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-4">
                                <!-- Post Month -->
                                <div class="form-group">
                                    <label for="post_month">Select Month</label>
                                    <select wire:model="post_month" class="form-select" id="post_month">
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                
                                @error('post_month') <span class="error">{{ $message }}</span> @enderror
                            </div>

              

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit"   wire:loading.attr="disabled"  class="btn btn-primary">Create News</button>
                                        <div wire:loading wire:target="createReporterNews">
                                            <i class="fas fa-1x fa-sync-alt fa-spin"></i>
                                         </div>
                                    
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
           
            </div>
        </div>
        </div>
             <!-- end row -->
        <script>
            document.addEventListener('livewire:initialized', () => {
            // CKEDITOR.replace('editor'); 
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');        
            CKEDITOR.replace('editor', {
            // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
            filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
            filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
            headers: {
            'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
            },

            });

            CKEDITOR.instances.editor.on('change', function () {
                @this.set('news_description', CKEDITOR.instances.editor.getData());
            });
            // Livewire.on('post-created', function () {
            //     });


            Livewire.on('formSubmitted', () => {
                CKEDITOR.instances.editor.setData(''); 
                });

            }); 
        </script>

    
    </div>


    @livewire('backend.news.view-reporter-news')
</div>
