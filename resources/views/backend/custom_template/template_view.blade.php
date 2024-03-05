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
                        <form id="generateForm"  action="/write/generate" method="post" class="row g-3">
                            @csrf
                            {{-- <input type="hidden" name="template_code" value="{{ $template->slug }}"> --}}
                            <div class="col-md-12">
                                <label for="language" class="form-label">Select Language</label>
                                <select class="form-select" name="language" id="language" aria-label="Floating label select example">
                                    <option disabled selected="">Enter Language</option>
                                    <option value="English">English</option>
                                    
                                  </select>
                             
                            </div>

                            @isset($inputTypes)
                            @foreach($inputTypes as $key => $type)
                                <div class="col-md-12">
                                     <label for="{{ $inputNames[$key] }}" class="form-label">{{ $inputLabels[$key] }}</label>
                                @if($type == 'text')
                                    <input type="text" name="{{ $inputNames[$key] }}" class="form-control" id="{{ $inputNames[$key] }}" placeholder="Enter {{ $inputLabels[$key] }}">
                                @elseif($type == 'textarea')
                                    <textarea class="form-control" name="{{ $inputNames[$key] }}" id="{{ $inputNames[$key] }}" rows="3"></textarea>
                                @endif
                                </div>

                                <div hidden class="col-md-12" data-prompt="{{ $customTemplate->prompt }}">
                                    <textarea class="form-control" name="prompt" id="VertimeassageInput" rows="3" placeholder="Enter your message">{{$customTemplate->prompt}}</textarea>
                                </div>
                            @endforeach
                            @endisset                                                
                           

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
                    <input type="range" name="max_result_length" class="form-range" id="max_result_length" min="10" max="4000" step="10" value="100">
                    <input type="number" name="max_result_length_value" class="form-control" id="max_result_length_value" min="10" max="4000" step="10" value="100">
                    
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
                            <option value="Friendly">Friendly</option>
                            <option value="Relaxed">Relaxed</option>
                            <option value="Casual">Casual</option>
                    
                          </select>
                    
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Temperature</label>
                        <input type="range" name="temperature" class="form-range" id="temperature" min="0" max="1" step="0.01" value="0.50">
                        <input type="number" name="temperature_value" class="form-control" id="temperature_value" min="0" max="1" step="0.01" value="0.50">

                    </div>

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Top P</label>
                        <input type="range" name="top_p" class="form-range" id="top_p" min="0" max="1" step="0.01" value="0.50">
                        <input type="number" name="top_p_value" class="form-control" id="top_p_value" min="0" max="1" step="0.01" value="0.50">
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Frequency Penalty</label>
                        <input type="range" name="frequency_penalty" class="form-range" id="frequency_penalty" min="0" max="2" step="0.01" value="1.00">
                        <input type="number" name="frequency_penalty_value" class="form-control" id="frequency_penalty_value" min="0" max="2" step="0.01" value="1.00">

                    </div>

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Presence Penalty</label>
                        <input type="range" name="presence_penalty" class="form-range" id="presence_penalty" min="0" max="2" step="0.01" value="1.00">
                        <input type="number" name="presence_penalty_value" class="form-control" id="presence_penalty_value" min="0" max="2" step="0.01" value="1.00">



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
                                {{-- {{ $content }} --}}
        
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






{{-- Submit Form Editor --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        // Update number input when the range slider changes
        $('#max_result_length').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(0); // Round to nearest integer
            $('#max_result_length_value').val(value);
        });
    
        // Update range slider when the number input changes
        $('#max_result_length_value').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(0); // Round to nearest integer
            if (!isNaN(value)) {
                $('#max_result_length').val(value);
            }
        });
    });
    </script>

<script>
    $(document).ready(function() {
        // Update number input when the range slider changes
        $('#presence_penalty').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            $('#presence_penalty_value').val(value);
        });
    
        // Update range slider when the number input changes
        $('#presence_penalty_value').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            if (!isNaN(value)) {
                $('#presence_penalty').val(value);
            }
        });
    });
    </script>

<script>
    $(document).ready(function() {
        // Update number input when the range slider changes
        $('#frequency_penalty').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            $('#frequency_penalty_value').val(value);
        });
    
        // Update range slider when the number input changes
        $('#frequency_penalty_value').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            if (!isNaN(value)) {
                $('#frequency_penalty').val(value);
            }
        });
    });
    </script>

<script>
    $(document).ready(function() {
        // Update number input when the range slider changes
        $('#top_p').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            $('#top_p_value').val(value);
        });
    
        // Update range slider when the number input changes
        $('#top_p_value').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            if (!isNaN(value)) {
                $('#top_p').val(value);
            }
        });
    });
    </script>

<script>
    $(document).ready(function() {
        // Update number input when the range slider changes
        $('#temperature').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            $('#temperature_value').val(value);
        });
    
        // Update range slider when the number input changes
        $('#temperature_value').on('input', function() {
            var value = parseFloat($(this).val()).toFixed(2);
            if (!isNaN(value)) {
                $('#temperature').val(value);
            }
        });
    });
    </script>

<script>
    $(document).ready(function () {
        $('#generateForm').submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    // Assuming 'content' is the key in your JSON response containing the generated content
                    $('.snow-editor').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error if any
                }
            });
        });
    });
</script>



@endsection
