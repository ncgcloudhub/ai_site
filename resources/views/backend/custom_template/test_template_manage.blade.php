@extends('layouts.master')
@section('title') @lang('translation.Listjs') @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Tables @endslot
        @slot('title') Listjs @endslot
    @endcomponent

    <style>
        .icc:hover {
   
    transition: transform 0.3s ease; /* Example: Add a smooth transition */
    cursor: pointer; /* Example: Change cursor to pointer on hover */
    background-color: #d1d8ff; /* Light purple background color on hover */
}

    </style>

<div class="card">
    <div class="card-body">
        @foreach ($customtemplatecategories as $item)
           
        <span>{{$item->category_name}}</span>

       @endforeach
    </div>
</div>

<div class="row">
    @foreach ($templates as $item)
    <div class="col-xl-2 col-md-4">
        <!-- card -->
        <div class="card card-animate icc">
            <div class="card-body">
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-soft-primary rounded fs-3">
                        <i class="bx bx-wallet text-primary"></i>
                    </span>
                </div>
               
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4 mt-1">{{$item->template_name}}</h4>
                   
                </div>

                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <p>Details</p>
                        <a href="" class="text-decoration-underline">Withdraw money</a>
                    </div>
                    <div class="d-flex gap-2"> <!-- Add this container with the gap-2 class -->
                        <div class="avatar-xxs flex-shrink-0">
                            <span class="rounded fs-3">
                                <i class="bx bx-heart text-primary"></i>
                            </span>
                        </div>
                        <div class="avatar-xxs flex-shrink-0">
                            <span class="rounded fs-3">
                                <i class="bx bx-edit text-primary"></i>
                            </span>
                        </div>
                        <div class="avatar-xxs flex-shrink-0">
                            <span class="rounded fs-3">
                                <i class="bx bxs-trash text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
                
        </div><!-- end card -->
    </div><!-- end col -->
    </div><!-- end col -->
    @endforeach
</div>

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id-field" class="form-label">ID</label>
                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Customer Name</label>
                            <input type="text" id="customername-field" class="form-control" placeholder="Enter Name" required />
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email</label>
                            <input type="email" id="email-field" class="form-control" placeholder="Enter Email" required />
                        </div>

                        <div class="mb-3">
                            <label for="phone-field" class="form-label">Phone</label>
                            <input type="text" id="phone-field" class="form-control"  placeholder="Enter Phone no." required />
                        </div>

                        <div class="mb-3">
                            <label for="date-field" class="form-label">Joining Date</label>
                            <input type="text" id="date-field" class="form-control" placeholder="Select Date" required />
                        </div>

                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" data-trigger name="status-field" id="status-field" >
                                <option value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="Block">Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
