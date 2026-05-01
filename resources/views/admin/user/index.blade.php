@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">All Users</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
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
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:280px;">
                                        <h6 class="fw-bold mb-3">Filter Options</h6>
                                        <div data-kt-user-table-filter="form">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Role</label>
                                                <select class="form-select role_type" data-kt-user-table-filter="role">
                                                    <option value="">All</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="user">User</option>
                                                    <option value="examiner">Examiner</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">City</label>
                                                <select class="form-select city" data-kt-user-table-filter="two-step">
                                                    <option value="">All</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end gap-2 mt-3">
                                                <button type="reset" class="btn btn-light" data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary" data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="add-user">
                                    <i class="fas fa-plus me-1"></i> Add User
                                </button>
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
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Add User</h2>
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
                                            <form id="kt_modal_add_user_form" method="POST" enctype="multipart/form-data" class="form" action="{{route('user.store')}}">
                                                @csrf

                                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                        <!--end::Label-->
                                                        <!--begin::Image placeholder-->
                                                        <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                                                        <!--end::Image placeholder-->
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px avatar-img" style="background-image: url(assets/media/avatars/300-6.jpg);"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="picture" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="old_picture" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"  />
                                                        <!--end::Input-->
                                                    </div> <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />
                                                        <input type="hidden" name="oldpassword" value="" />
                                                        <input type="hidden" name="edit_id" value="" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                        <!--end::Label-->
                                                        <!--begin::Roles-->
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="type" type="radio" value="admin" id="admin" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label" for="admin">
                                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                                    <div class="text-gray-600">Best for business owners and company administrators</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="type" type="radio" value="user" id="user" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label" for="user">
                                                                    <div class="fw-bold text-gray-800">User</div>
                                                                    <div class="text-gray-600">Best for user or people primarily using the API</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>       <!--begin::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input me-3" name="type" type="radio" value="examiner" id="examiner" />
                                                                <label class="form-check-label" for="examiner">
                                                                    <div class="fw-bold text-gray-800">Examiner</div>
                                                                    <div class="text-gray-600">Prüfer-Konto für Prüfaufträge</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input me-3" name="type" type="radio" value="staff" id="staff" />
                                                                <label class="form-check-label" for="staff">
                                                                    <div class="fw-bold text-gray-800">Staff</div>
                                                                    <div class="text-gray-600">Backoffice: Buchungen anlegen/bearbeiten, Prüfer zuweisen</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class='separator separator-dashed my-5'></div>

                                                        
                                                        <!--end::Roles-->
                                                    </div>
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
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <table class="table table-hover align-middle w-100" id="kt_table_users">
                            <thead>
                            <tr class="text-start fw-bold text-uppercase table-light">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Company Name</th>
                                <th>DOB</th>
                                <th>Joined Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection


@section('js')
    <script src="{{ asset('custom/users.js') }}"></script>
    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/export-users.js') }}"></script>

    <script>
        $(document).on('click','.edit-btn',function (e){
            e.preventDefault();
           modal= $("#kt_modal_add_user").modal('show');
            var data = $(this).data();
            console.log(data)
            var imageUrl = data.picture;
            $('.avatar-img').css("background-image", "url(" + imageUrl + ")")
            modal.find('[name=name]').val(data.name);
            modal.find('[name=edit_id]').val(data.id);
            modal.find('[name=email]').val(data.email);
            modal.find('[name=oldpassword]').val(data.old_password);
            modal.find('[name=old_picture]').val(data.picture);
            if(data.type == 'examiner'){
                var exEl = document.querySelector('#examiner'); if (exEl) exEl.checked = true;
            }else if(data.type == 'staff'){
                var stEl = document.querySelector('#staff'); if (stEl) stEl.checked = true;
            }else if(data.type == 'admin'){
                document.querySelector('#admin').checked = true;
            }else{
                document.querySelector('#user').checked = true;
            }
        })
        $(document).on('click','.btn-close-modal',function (){
            $('#kt_modal_add_user').modal('hide');
        })
    </script>

    <script>
        $('#add-user').click(function (){
            var modal = $("#kt_modal_add_user").modal('show');
            $('.avatar-img').css("background-image", "url('')")
            modal.find('[name=name]').val('');
            modal.find('[name=edit_id]').val('');
            modal.find('[name=email]').val('');
            modal.find('[name=password]').val('');
            modal.find('[name=oldpassword]').val('');
            modal.find('[name=old_picture]').val('');

        })


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
                    toastr.success('',data.success);
                    // $('#kt_modal_add_user').hide();
                    $("#kt_modal_add_user").modal('hide');
                    window.location.reload()
                },
                error: function(data) {
                    // console.log(data.responseJSON.errors);
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
                }
            });
        });

    </script>
{{--    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/add.js') }}"></script>--}}
@endsection
