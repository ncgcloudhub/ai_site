@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent


<div class="col-xxl-6">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Gutters</h4>
           
        </div><!-- end card header -->

        <div class="card-body">
          
            <div class="live-preview">
                <form method="POST" action="{{route('openai.settings.store')}}" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <label for="fullnameInput" class="form-label">OpenAI API Key</label>
                        <input type="password" name="openaiapikey" class="form-control" id="openaiapikey" placeholder="Enter API key for Open AI">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Open AI Model</label>
                        <select class="form-select" name="openaimodel" id="openaimodel" aria-label="Floating label select example">
                            <option disabled selected="">Enter Open AI Model</option>
                            <option value="gpt-3.5-turbo-instruct">gpt-3.5-turbo-instruct</option>
                            
                          </select>
                     
                    </div>
                    
                  
                    <div class="col-12">
                        <div class="text-end">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Project">
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-none code-view">

            </div>
        </div>
    </div>
</div> <!-- end col -->


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
