@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')  Custom Template @endslot
@slot('title') Add @endslot
@endcomponent


<div class="col-xxl-6">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Basic Information</h4>
           
        </div><!-- end card header -->

        <div class="card-body">
          
            <div class="live-preview">
                <form method="POST" action="{{route('openai.settings.store')}}" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <label for="template_name" class="form-label">Template Name</label>
                        <input type="text" name="template_name" class="form-control" id="template_name" placeholder="Enter Template Name">
                    </div>
                    <div class="col-md-12">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter Icon">
                    </div>
                    <div class="col-md-12">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id" aria-label="Floating label select example">
                            <option disabled selected="">Select Category</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                          </select>
                     
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    
                  
                   
            </div>
        
        </div>
    </div>


    {{-- 2nd Card --}}
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Input Information</h4>
           
        </div><!-- end card header -->

        <div class="card-body custom-input-informations">
          
            <div class="live-preview ">
               
                    <div class="col-md-12">
                        <label for="input_types" class="form-label">Input Type</label>
                        <select class="form-select" name="input_types[]" id="input_types" aria-label="Floating label select example">
                            <option value="text">Input Field</option>
                            <option value="textarea">Textarea Field</option>
                            
                          </select>
                    </div>
                    <div class="col-md-12">
                        <label for="input_names" class="form-label">Input Name</label>
                        <input type="text" name="input_names[]" onchange="generateInputNames(true)"
                        placeholder="Type input name" class="form-control"
                        required>
                     
                    </div>
                    <div class="col-md-12">
                        <label for="input_label" class="form-label">Input Label</label>
                        <input type="text" name="input_labels[]"
                        placeholder="Type input label" class="form-control"
                        required>
                     
                    </div>
                    <button type="button" class="btn btn-link px-0 fw-medium" data-toggle="add-more"
                    data-content='
                    <div class="col-md-12">
                        <label for="input_types" class="form-label">Input Type</label>
                        <select class="form-select" name="input_types[]" id="input_types" aria-label="Floating label select example">
                            <option value="text">Input Field</option>
                            <option value="textarea">Textarea Field</option>
                            
                          </select>
                    </div>
                    <div class="col-md-12">
                        <label for="input_names" class="form-label">Input Name</label>
                        <input type="text" name="input_names[]" onchange="generateInputNames(true)"
                        placeholder="Type input name" class="form-control"
                        required>
                     
                    </div>
                    <div class="col-md-12">
                        <label for="input_label" class="form-label">Input Label</label>
                        <input type="text" name="input_labels[]"
                        placeholder="Type input label" class="form-control"
                        required>
                     
                    </div>'
                    data-target=".custom-input-informations">
                    <div class="d-flex align-items-center"><i data-feather="plus"></i>
                        <span>Add More</span>
                    </div>
                </button>
                    
                  
                   
               
            </div>
          
        </div>
    </div>
    {{-- 2nd Card End --}}


    {{-- 3rd Card --}}
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Prompt Information</h4>
           
        </div><!-- end card header -->

        <div class="card-body">
          
            <div class="live-preview">
               
                    <div class="col-md-12">
                        <textarea class="form-control" id="VertimeassageInput" rows="3" placeholder="Enter your message"></textarea>
                    </div>
              
            </div>
            
        </div>
    </div>

    {{-- 3rd Card End --}}
    <div class="col-12">
        <div class="text-end">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save">
        </div>
    </div>
</form>

</div> 


@endsection

