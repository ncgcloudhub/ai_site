@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent


<div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Category Add</h4>
    </div><!-- end card header -->

    <div class="card-body">
      
        <div class="live-preview">
            <form  action="/generate/image" method="post" class="row g-3">
                @csrf
               

                <div class="form-floating">
                    <input type="text" name="prompt" class="form-control" id="prompt" placeholder="Enter Prompt">
                    <label for="category_name">Prompt</label>
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














@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
