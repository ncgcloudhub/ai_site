@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Image @endslot
@slot('title') Generate Image  @endslot
@endcomponent


<div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Generate Image</h4>
    </div><!-- end card header -->

    <div class="card-body">
      
        <div class="live-preview">
                <div class="col-xxl-12 justify-content-center">
                   
                    <div class="card">
                        <div class="card-body">
                           
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified col-2 mb-3 m-auto" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
                                            Dall-E 2
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
                                        Dall-E 3
                                    </a>
                                </li>
                              
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">


                                    <!-- Base Example -->
                                    <form  action="/generate/image" method="post" class="row g-3">
                                        @csrf

                                        <input type="hidden" name="dall_e_2"  value="dall_e_2">
                                    <div class="accordion col-xxl-6 col-sm-6 mb-3 m-auto" id="default-accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header col-xxl-3" id="headingOne">
                                                <button class="accordion-button col-md-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Advance Settings
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input1">Image Style</label>
                                                            <select name="style" class="form-control" id="style">
                                                                <option value="natural">Natural</option>
                                                                <option value="vivid">Vivid</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input2">Image Quality</label>
                                                            <select name="quality" class="form-control" id="quality">
                                                                <option value="standard">Standard</option>
                                                                <option value="hd">HD</option>
                                                            </select>
                                                        </div>                                                        

                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input3">Image Resolution</label>
                                                            <select name="image_res" class="form-control" id="image_res">
                                                                <option value="256x256">256x256</option>
                                                                <option value="512x512">512x512</option>
                                                                <option value="1024x1024">1024x1024</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input4">No. of Result</label>
                                                            <select name="no_of_result" class="form-control" id="no_of_result">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                        


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                 <div class="row g-3 justify-content-center">
                                        <div class="col-xxl-5 col-sm-6">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" name="prompt" id="prompt"
                                                    placeholder="Write prompt to generate Image">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        
                                        <div class="col-xxl-1 col-sm-4">
                                            <div>
                                                <button class="btn btn-rounded btn-primary mb-2">Generate</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                                   
                                </div>


                               

                                    
                                <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
                                    <form  action="/generate/image" method="post" class="row g-3">
                                        @csrf
                                    <input type="hidden" name="dall_e_3" value="dall_e_3">

                                    <div class="accordion col-xxl-6 col-sm-6 mb-3 m-auto" id="default-accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header col-xxl-3" id="headingOne">
                                                <button class="accordion-button col-md-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Advance Settings
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input1">Image Style</label>
                                                            <select name="style" class="form-control" id="style">
                                                                <option value="natural">Natural</option>
                                                                <option value="vivid">Vivid</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input2">Image Quality</label>
                                                            <select name="quality" class="form-control" id="quality">
                                                                <option value="standard">Standard</option>
                                                                <option value="hd">HD</option>
                                                            </select>
                                                        </div>                                                        

                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input3">Image Resolution</label>
                                                            <select name="image_res" class="form-control" id="image_res">
                                                                <option value="1024x1024">1024x1024</option>
                                                                <option value="1792x1024">1792x1024</option>
                                                                <option value="1024x1792">1024x1792</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input4">No. of Result</label>
                                                            <select name="no_of_result" class="form-control" id="no_of_result">
                                                                <option value="1">1</option>
                                                                
                                                            </select>
                                                        </div>
                                                        


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 justify-content-center">
                                        <div class="col-xxl-5 col-sm-6">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" name="prompt" id="prompt"
                                                    placeholder="Write prompt to generate Image">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        
                                        <div class="col-xxl-1 col-sm-4">
                                            <div>
                                                <button class="btn btn-rounded btn-primary mb-2">Generate</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </form>
                                </div>
                           
                              
                               
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!--end col-->
                <div class="spinner-border text-primary d-none" role="status" id="loader">
                    <span class="sr-only">Loading...</span>
                </div>

                <div id="image-container"></div>


            {{-- @if(isset($imageURL)) --}}
            <div class="gallery-container">
                @if(isset($imageURL))
                <a class="image-popup" href="{{ $imageURL }}" title="">
                    <img class="gallery-img img-fluid mx-auto" src="{{ $imageURL }}" alt="" />
                </a>
                
                <!-- Download Button Form -->
                <form action="/download-image/{imageURL}" method="get" style="margin-top: 10px;">
                    @csrf
                    <input type="hidden" name="imageURL" value="{{ $imageURL }}">
                    <button type="submit" class="btn btn-primary">Download Image</button>
                </form>
                <!-- End Download Button Form -->
                
                @endif
            </div>
            
             {{-- @else
            <p>Error: Failed to generate image.</p>
             @endif --}}
             
             {{-- <div class="row gallery-wrapper">
                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"  data-category="designing development">
                    <div class="gallery-box card">
                        <div class="gallery-container">
                            @if(isset($imageURL))
                            <a class="image-popup" href="{{ $imageURL }}" title="">
                                <img class="gallery-img img-fluid mx-auto" src="{{ $imageURL }}" alt="" />
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
          
            </div> --}}

        </div>

        
        <!-- end row -->
  
    </div>
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/isotope-layout/isotope-layout.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>



{{-- Test Ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Show loader
        $('#loader').removeClass('d-none');

            // Serialize form data
            var formData = $(this).serialize();
            
            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '/generate/image',
                data: formData,
                success: function(response) {
                    if (response.hasOwnProperty('imageURL')) {
                    // Create an image element
                    var img = $('<img>').attr('src', response.imageURL);
                    
                    // When the image is fully loaded, hide the loader
                    img.on('load', function() {
                        $('#loader').addClass('d-none');
                    });
                    
                    // Append the image to the container
                    $('#image-container').html(img);
                } else {
                    console.log(response);
                }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    // You may display an error message or perform any other actions here
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>


@endsection
