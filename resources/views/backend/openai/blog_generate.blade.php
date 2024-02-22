@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/quill/quill.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
   
           <div class="col-5">
            <div class="card">
               
        
                <div class="card-body">
                  
                    <div class="live-preview">
                        <form  action="/write/generate" method="post" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="language" class="form-label">Select Language</label>
                                <select class="form-select" name="language" id="language" aria-label="Floating label select example">
                                    <option disabled selected="">Enter Language</option>
                                    <option value="English">English</option>
                                    
                                  </select>
                             
                            </div>

                            <div class="col-md-12">
                                <label for="blog_title" class="form-label">Title of the blog</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Blog Title">
                            </div>

                            <div class="col-md-12">
                                <label for="main_points" class="form-label">What are the main points you want to cover?</label>
                                <textarea class="form-control" name="main_points" id="main_points" rows="3"></textarea>
                            </div>
                           
                                                
                           

                            <!-- Accordion Flush Example -->
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Advance Settings
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

            
                <div class="col-md-12">
                    <label for="max_result_length" class="form-label">Max Result Length</label>
                    <input type="number" name="max_result_length" class="form-control" id="max_result_length" placeholder="Enter Max Result Length">
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                        <label for="creative_level" class="form-label">Creative Level</label>
                        <select class="form-select" name="creative_level" id="creative_level" aria-label="Floating label select example">
                            <option disabled selected="">Enter Creative Level</option>
                            <option value="High">High</option>
                    
                          </select>
                    
                    </div>
                    <div class="col-md-6">
                        <label for="tone" class="form-label">Choose a Tone</label>
                        <select class="form-select" name="tone" id="tone" aria-label="Floating label select example">
                            <option disabled selected="">Enter Tone</option>
                            <option value="Professional">Professional</option>
                    
                          </select>
                    
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>
<div class="col-12">
    <div class="text-end">
        <button class="btn btn-rounded btn-primary mb-5">Generate</button>
        {{-- <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Generate"> --}}
    </div>
</div>
                        </form>
                    </div>
                    <div class="d-none code-view">
        
                    </div>
                </div>
            </div>
           </div>
           <div class="col">

            <div class="row mt-2">
                <div class="col-lg-12">
        
                
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Snow Editor</h4>
                        </div><!-- end card header -->
        
                        <div class="card-body">
                            <div class="snow-editor" style="height: 300px;" readonly>
                                {{ $content }}
        
                            </div> <!-- end Snow-editor-->
                        </div><!-- end card-body -->


                    </div><!-- end card -->
        
                 
                </div>
                <!-- end col -->
            </div>

           </div>

        

    

 
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/quill/quill.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
