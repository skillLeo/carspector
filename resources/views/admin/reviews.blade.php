@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Reviews</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Reviews</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center my-1">
                                <input type="text" data-kt-user-table-filter="search" class="form-control w-250px" placeholder="Search..." />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end gap-2" data-kt-user-table-toolbar="base">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:240px;">
                                        <h6 class="fw-bold mb-3">Filter Options</h6>
                                        <div data-kt-user-table-filter="form">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select class="form-select check-status" data-kt-user-table-filter="role">
                                                    <option value="">All</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Canceled">Canceled</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end gap-2 mt-3">
                                                <button type="reset" class="btn btn-light" data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary" data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->

                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add task-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <table class="table table-hover align-middle w-100" id="kt_table_users">
                            <thead>
                            <tr class="text-start fw-bold text-uppercase table-light">
                                <th>User</th>
                                <th>Examiners</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update Status</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-close-modal btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																</svg>
															</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_add_user_form" method="POST" enctype="multipart/form-data" class="form" action="{{route('admin.withdraw-status')}}">
                        @csrf
                        <!--begin::Scroll-->
                        <input type="hidden" name="id" class="trx-id">
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <!--end::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                <!--end::Label-->
                                <select class="form-control" name="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Canceled">Canceled</option>
                                </select>

                            </div> <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection


@section('js')
    <script src="{{ asset('custom/reviews.js') }}"></script>
    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/export-users.js') }}"></script>

    <script>


        $('#kt_modal_add_user_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            // formData.append('prices',JSON.stringify(category_price));
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    toastr.success('',data);
                    // $('#kt_modal_add_user').hide();
                    $("#kt_modal_add_user").modal('hide');
                    window.location.reload()
                },
                error: function(data) {
                    console.log(data.responseJSON.errors);
                    var error= data.responseJSON.errors;
                    if(error.name){
                        toastr.error('',error.name);
                    }
                    if(error.email){
                        toastr.error('',error.email);
                    }
                    if(error.password){
                        toastr.error('',error.password);
                    }
                    if(error.type){
                        toastr.error('',error.type);
                    }
                    // console.log(error);
                }
            });
        });

        $(document).on('click','.btn-update-status',function (e){
            e.preventDefault();
            var id=$(this).attr('data-id');
            $('.trx-id').val(id);
        })
    </script>
    {{--    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/add.js') }}"></script>--}}
@endsection
