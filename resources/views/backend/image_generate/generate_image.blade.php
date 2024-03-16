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
            <form  action="/generate/image" method="post" class="row g-3">
                @csrf
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
                                                            <input type="text" class="form-control" id="input1" placeholder="Enter input 1">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input2">Mood</label>
                                                            <input type="text" class="form-control" id="input2" placeholder="Enter input 2">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input3">Image Resolution</label>
                                                            <input type="text" class="form-control" id="input3" placeholder="Enter input 3">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="input4">No. of Result</label>
                                                            <input type="text" class="form-control" id="input4" placeholder="Enter input 4">
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
                                   
                                </div>
                                <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
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
                                </div>
                              
                               
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!--end col-->

            </form>

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
@endsection
