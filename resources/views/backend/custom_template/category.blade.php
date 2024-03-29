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

<div class="col-xxl-6">
   
           
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Category Add</h4>
                </div><!-- end card header -->
        
                <div class="card-body">
                  
                    <div class="live-preview">
                        <form  action="/custom/category/store" method="post" class="row g-3">
                            @csrf
                           

                            <div class="form-floating">
                                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category">
                                <label for="category_name">Category</label>
                            </div>

                            <div class="form-floating">
                                <input type="text" name="category_icon" class="form-control" id="category_icon" placeholder="Enter Icon">
                                <label for="icon">Enter Icon</label>
                            </div>
                                            
<div class="col-12">
    <div class="text-end">
        <button class="btn btn-rounded btn-primary mb-2">Save</button>
    </div>
</div>
                        </form>
                    </div>
              
                </div>
            </div>
           
         <div class="card">
            
                <div class="card-body pt-0">

                    <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Category List</h6>
                    <ul class="list-group">
                        @foreach ($categories as $item)
                        <li class="list-group-item"><i class="{{$item->category_icon}}"></i> {{$item->category_name}}</li>
                        @endforeach
                    </ul>

                </div><!-- end cardbody -->
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
