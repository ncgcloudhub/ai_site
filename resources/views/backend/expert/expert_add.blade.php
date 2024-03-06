@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('css')

<link href="{{ URL::asset('/asets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/asets/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('/asets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1')  Expert @endslot
@slot('title') Add @endslot
@endcomponent

<div class="col-xxl-6">
    <form method="POST" action="{{route('custom.template.store')}}" class="row g-3">
        @csrf
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Basic Information</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                
                    <div class="col-md-12">
                        <label for="expert_name" class="form-label">Expert Name</label>
                        <input type="text" name="expert_name" class="form-control" id="expert_name" placeholder="Enter Expert Name">
                    </div>

                    <div class="col-md-12">
                        <label for="character_name" class="form-label">Character Name</label>
                        <input type="text" name="character_name" class="form-control" id="character_name" placeholder="Enter Character Name">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Short Description"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role">
                    </div>

                    <div class="col-md-12">
                        <label for="expertise" class="form-label">Expertise</label>
                        <textarea name="expertise" class="form-control" id="expertise" rows="3" placeholder="Enter Expertise"></textarea>
                    </div>
               
            </div>
        </div>
    </div>

    {{-- 2nd Card --}}
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Train Expert</h4>
        </div><!-- end card header -->

        <div class="card-body custom-input-informations">
            <div class="live-preview">
              
                        <label for="expertise" class="form-label">Expertise</label>
                        <textarea name="expertise" class="form-control" id="expertise" rows="3" placeholder="Enter Expertise"></textarea>

            </div>
        </div>
    </div>
    {{-- 2nd Card End --}}

    {{-- 3rd Card --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Profile Picture Selection</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file upload variation.</p>
            <div class="avatar-xl mx-auto">
                <input type="file"
                class="filepond filepond-input-circle"
                name="filepond"
                accept="image/png, image/jpeg, image/gif"/>
            </div>

        </div>
        <!-- end card body -->
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



@section('script')
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
</script>
<script
    src="{{ URL::asset('/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
</script>
<script
    src="{{ URL::asset('/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
</script>
<script src="{{ URL::asset('/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-file-upload.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection