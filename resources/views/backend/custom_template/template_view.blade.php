@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/quill/quill.min.css" rel="stylesheet" type="text/css" />
<!-- nouisliderribute css -->
<link href="/assets/libs/nouislider/nouislider.min.css" rel="stylesheet" type="text/css">
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

                <div class="row">

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Temperature</label>
                        <input type="number" name="temperature" class="form-control" id="temperature" placeholder="Enter Max Result Length">
                    </div>

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Top P</label>
                        <input type="number" name="top_p" class="form-control" id="top_p" placeholder="Enter Max Result Length">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Frequency Penalty</label>
                        <input type="number" name="frequency_penalty" class="form-control" id="frequency_penalty" placeholder="Enter Max Result Length">
                    </div>

                    <div class="col-md-6">
                        <label for="max_result_length" class="form-label">Presence Penalty</label>
                        <input type="number" name="presence_penalty" class="form-control" id="presence_penalty" placeholder="Enter Max Result Length">
                    </div>
                </div>

                {{-- <div class="col-lg-9">
                    <div class="d-inline-flex gap-2 mb-3">
                        <select id="input-select" class="form-select form-select-sm w-xs shadow-none"><option value="-20">-20</option><option value="-19">-19</option><option value="-18">-18</option><option value="-17">-17</option><option value="-16">-16</option><option value="-15">-15</option><option value="-14">-14</option><option value="-13">-13</option><option value="-12">-12</option><option value="-11">-11</option><option value="-10">-10</option><option value="-9">-9</option><option value="-8">-8</option><option value="-7">-7</option><option value="-6">-6</option><option value="-5">-5</option><option value="-4">-4</option><option value="-3">-3</option><option value="-2">-2</option><option value="-1">-1</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option></select>
                        <input type="number" class="form-control form-control-sm w-xs shadow-none" min="-20" max="40" step="1" id="input-number">
                    </div>
                    <div id="html5" class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(50%, 0px) scale(0.333333, 1);"></div></div><div class="noUi-origin" style="transform: translate(-50%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="-20.0" aria-valuemax="30.0" aria-valuenow="10.0" aria-valuetext="10.00"><div class="noUi-touch-area"></div></div></div><div class="noUi-origin" style="transform: translate(-16.6667%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="10.0" aria-valuemax="40.0" aria-valuenow="30.0" aria-valuetext="30.00"><div class="noUi-touch-area"></div></div></div></div></div>
                    
                </div> --}}

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


 <!-- nouisliderribute js -->
 <script src="/assets/libs/nouislider/nouislider.min.js"></script>
 <script src="/assets/libs/wnumb/wNumb.min.js"></script>
 <!-- range slider init -->
 <script src="/assets/js/pages/range-sliders.init.js"></script>

 <script src="/assets/js/app.js"></script>

@endsection
