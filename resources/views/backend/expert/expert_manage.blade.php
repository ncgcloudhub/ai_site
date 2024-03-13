@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="assets/libs/glightbox/glightbox.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent

<div class="row">
    @foreach ($experts as $item)
    <div class="col-3">
 
    <div class="card mb-1">
    <div class="card-body">
        <a class="d-flex align-items-center" href="{{ route('expert.chat',$item->id) }}" role="button">
            <div class="flex-shrink-0">
                <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-xs rounded-circle">
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="fs-15 mb-1">{{$item->expert_name}}</h6>
                <p class="text-muted mb-0">{{$item->role}}</p>
            </div>
        </a>
    </div>
</div>
     

</div>
@endforeach
</div>


@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
@section('script')
    <script src="assets/libs/glightbox/glightbox.min.js"></script>

    <!-- fgEmojiPicker js -->
    <script src="assets/libs/fg-emoji-picker/fg-emoji-picker.min.js"></script>

    <!-- chat init js -->
    <script src="assets/js/pages/chat.init.js"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
