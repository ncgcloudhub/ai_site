@extends('layouts.master')
@section('title') @lang('translation.orders') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Orders @endslot
@endcomponent

<style>
   .template-card:hover {
    transform: scale(.95);
    transition: transform 0.3s ease;
    
} 

.template-card:hover .card-body {
    background-color: #d4e9f0; /* Light blue background color */
}

</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Order History</h5>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                            id="create-btn" data-bs-target="#showModal"><i
                                class="ri-add-line align-bottom me-1"></i> Create
                            Order</button>
                        <button type="button" class="btn btn-info"><i
                                class="ri-file-download-line align-bottom me-1"></i> Import</button>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search"
                                    placeholder="Search for order ID, customer, order status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-6">
                            <div>
                                <input type="text" class="form-control" data-provider="flatpickr"
                                    data-date-format="d M, Y" data-range-date="true"
                                    id="demo-datepicker" placeholder="Select date">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="idStatus">
                                    <option value="">Status</option>
                                    <option value="all" selected>All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Pickups">Pickups</option>
                                    <option value="Returns">Returns</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="idPayment">
                                    <option value="">Select Payment</option>
                                    <option value="all" selected>All</option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Visa">Visa</option>
                                    <option value="COD">COD</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4">
                            <div>
                                <button type="button" class="btn btn-primary w-100"
                                    onclick="SearchData();"> <i
                                        class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body pt-0">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                href="#home1" role="tab" aria-selected="true">
                                <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                            </a>
                        </li>
                        @foreach ($customtemplatecategories as $item)
                            <li class="nav-item">
                                <a class="nav-link py-3 {{$item->category_name}}" data-bs-toggle="tab" id="{{$item->id}}"
                                    href="#{{$item->id}}" role="tab" aria-selected="false">
                                    <i class="{{$item->category_icon}}"></i>{{$item->category_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="table-card mb-1">
                        <div class="row template-row">
                            @foreach ($templates as $item)
                           
                            <div class="col-md-3 p-3 template-card" data-category="{{$item->category_id}}">
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="text" name="checkAll" value="{{$item->category_id}}">
                                        </div>
                                        <h5 class="card-title">Order ID: <a href="{{ route('custom.template.view', ['id' => $item->id]) }}" class="fw-medium link-primary">{{$item->template_name}}</a></h5>
                                        <p class="card-text customer_name">Customer: Frank Hook</p>
                                        <p class="card-text product_name">Product: Puma Tshirt</p>
                                        <p class="card-text date">Order Date: 20 Dec, 2021, <small class="text-muted">02:21 AM</small></p>
                                        <p class="card-text amount">Amount: $654</p>
                                        <p class="card-text payment">Payment Method: Mastercard</p>
                                        <p class="card-text status"><span class="badge badge-soft-warning text-uppercase">Pending</span></p>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="apps-ecommerce-order-details" class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                           
                            </div>
                            
                                @endforeach
                            </div>














                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                    trigger="loop" colors="primary:#405189,secondary:#0ab39c"
                                    style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted">We've searched more than 150+ Orders We did
                                    not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                    trigger="loop" colors="primary:#405189,secondary:#f06548"
                                    style="width:90px;height:90px"></lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a order ?</h4>
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove
                                        all of
                                        your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button
                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                            data-bs-dismiss="modal"><i
                                                class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button class="btn btn-danger" id="delete-record">Yes,
                                            Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection
@section('script')
<script src="assets/libs/list.js/list.js.min.js"></script>
        <script src="assets/libs/list.pagination.js/list.pagination.js.min.js"></script>

        <!--ecommerce-customer init js -->
        <script src="assets/js/pages/ecommerce-order.init.js"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.nav-link').on('click', function() {

            // Remove 'active' class from all nav links
        $('.nav-link').removeClass('active');
        
        // Add 'active' class to the clicked nav link
        $(this).addClass('active');
        
            var category = $(this).attr('id');
            if (category === 'All') {
            $('.template-card').show(); // Show all templates
        } else {
            $('.template-card').hide(); // Hide all templates initially
            $('.template-card[data-category="' + category + '"]').show(); // Show templates that match the selected category
        }
        });
    });
</script>

@endsection
