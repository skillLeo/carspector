@extends('mainpages.mainadmin')
@section('styles')
   <style>
       .all-info-popup .modal-dialog {
           max-width: 345px;
           margin: 0 auto;
       }
       .card-bill-body ul li {
           display: flex;
           align-items: center;
           justify-content: space-between;
           color: white;
           padding: 4px 0px;
           font-size: 16px;
       }
       .bg-primary {
           background-color: #1877F2 !important;
       }
       .card-bill-body ul li {
           color: white;
           font-size: 16px;
       }
       .profile-content-wrapper{
           padding: 24px 19px 18px 15px;
       }


       .profile-reviews{
           flex: 0 0 auto;
           width: 343px;
       }
       .profile-reviews h6{
           font-weight: 600;
           font-size: 16px;
           line-height: 20px;
           margin-bottom: 6px;
       }
       .profile-review-item{
           background: #FFFFFF;
           border-radius: 15px;
           margin-bottom: 8px;
           padding: 12px 11px;
       }
       .profile-review-header{
           display: flex;
           align-items: center;
       }
       .profile-review-header h6{
           font-weight: 500;
           font-size: 17px;
           line-height: 21px;
           margin-bottom: 0px;
       }
       .profile-review-star{
           display: flex;
           align-items: center;

       }
       .profile-review-star img{
           max-width: 16px;
           width: 16px;
       }
       .profile-review-star p{
           font-weight: 400;
           font-size: 15px;
           line-height: 18px;
           margin-bottom: 0px;
       }
       .profile-review-desc {
           margin-top: 10px;
       }
       .profile-review-desc p{
           font-weight: 400;
           font-size: 15px;
           line-height: 18px;
           margin-bottom: 0px;
       }

       .profile-service {
           display: flex;
           align-items: stretch;
           flex-direction: column;
           justify-content: space-between;
           padding: 17px 8px;
           border-radius: 15px;
           background-color: var(--primary);
           flex: 0 0 auto;
           max-width: 350px;
           width: 100%;
       }
       #admin-user-profile {
           display: grid !important;
           grid-template-columns: 290px minmax(0, 1fr);
           gap: 1.25rem;
           align-items: start;
       }
       #admin-user-profile .profile-sidebar {
           min-width: 0;
       }
       #admin-user-profile .profile-main {
           min-width: 0;
           margin-left: 0 !important;
       }
       #admin-user-profile .card {
           border-radius: .5rem;
       }
       #admin-user-profile .card-body {
           padding: 1.5rem;
       }
       #admin-user-profile .profile-sidebar .card-body {
           padding: 1.5rem 1.25rem;
       }
       #admin-user-profile .symbol-100px {
           width: 96px;
           height: 96px;
           flex: 0 0 96px;
       }
       #admin-user-profile .symbol-100px img {
           width: 96px !important;
           height: 96px !important;
           object-fit: cover;
           border-radius: 50%;
           border: 1px solid #dee2e6;
           background: #f8f9fa;
       }
       #admin-user-profile .flex-center {
           align-items: center;
           justify-content: center;
       }
       #admin-user-profile .profile-summary-stats {
           display: grid !important;
           grid-template-columns: 1fr;
           gap: .75rem;
           width: 100%;
       }
       #admin-user-profile .profile-summary-stats > div {
           width: 100%;
           margin: 0 !important;
           padding: .9rem 1rem !important;
           border: 1px solid #dee2e6 !important;
           border-radius: .5rem !important;
           background: #fff;
       }
       #admin-user-profile .profile-summary-stats .fs-4 {
           display: flex;
           align-items: center;
           justify-content: space-between;
           gap: .5rem;
       }
       #admin-user-profile .profile-details-toggle {
           cursor: pointer;
           border-top: 1px solid #e9ecef;
           margin-top: 1rem;
           padding-top: 1rem !important;
       }
       #admin-user-profile .profile-main-tabs {
           display: flex;
           align-items: center;
           gap: .35rem;
           margin-bottom: 1rem !important;
           padding: .25rem 0 0;
           border-bottom: 1px solid #dee2e6 !important;
           flex-wrap: wrap;
       }
       #admin-user-profile .profile-main-tabs .nav-link {
           color: #495057;
           font-size: 1rem;
           font-weight: 600;
           padding: .75rem 1rem !important;
           border: 0;
           border-bottom: 3px solid transparent;
       }
       #admin-user-profile .profile-main-tabs .nav-link.active {
           color: #0d6efd;
           border-bottom-color: #0d6efd;
           background: transparent;
       }
       #admin-user-profile .profile-main-tabs .nav-item.ms-auto {
           margin-left: auto !important;
       }
       #admin-user-profile .alert {
           align-items: center;
           border-radius: .5rem;
           margin-bottom: 1rem;
       }
       #admin-user-profile .alert .btn {
           text-decoration: none;
       }
       #admin-user-profile h2 {
           font-size: 1.75rem;
           line-height: 1.25;
           margin-bottom: 0;
       }
       #admin-user-profile .card-header {
           min-height: auto;
           padding: 1.25rem 1.5rem 0;
       }
       #admin-user-profile .table {
           margin-bottom: 0;
       }
       #admin-user-profile .table th,
       #admin-user-profile .table td {
           vertical-align: middle;
           white-space: nowrap;
       }
       #admin-user-profile .about-card p,
       #admin-user-profile .about-card div {
           overflow-wrap: anywhere;
           line-height: 1.55;
       }
       #admin-user-profile .balance-card .card-toolbar {
           margin-left: auto;
       }
       @media (max-width: 1199.98px) {
           #admin-user-profile {
               grid-template-columns: 1fr;
           }
       }
       @media (max-width: 767.98px) {
           #admin-user-profile .profile-main-tabs .nav-item.ms-auto {
               width: 100%;
               margin-left: 0 !important;
           }
           #admin-user-profile .profile-main-tabs .nav-item.ms-auto .btn {
               width: 100%;
           }
       }
   </style>
    @endsection
@section('content')
            <!--begin::Layout-->
            <div id="admin-user-profile" class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="profile-sidebar flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{$user->image}}" alt="{{$user->name}}" onerror="this.onerror=null;this.src='{{ asset('avatar.png') }}';" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$user->name}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                @if($user->type=='examiner')
                                <div class="fs-5 fw-semibold text-muted mb-6">Examiner</div>
                                @endif
                                @if($user->type=='user')
                                    <div class="fs-5 fw-semibold text-muted mb-6">User</div>
                                @endif
                                @if($user->type=='admin')
                                    <div class="fs-5 fw-semibold text-muted mb-6">Admin</div>
                                @endif
                                <!--end::Position-->
                                <!--begin::Info-->
                                <div class="profile-summary-stats d-flex flex-wrap flex-center">
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bold text-gray-700">
                                            <span class="w-75px">{{number_format($earnings,2)}}</span>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
																	<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-semibold text-muted">Earnings</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                        <div class="fs-4 fw-bold text-gray-700">
                                            <span class="w-50px">{{count($bookings)}}</span>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-danger">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																	<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-semibold text-muted">Bookings</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bold text-gray-700">
                                            <span class="w-50px">{{$user->balance}}</span>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
																	<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-semibold text-muted">Balance</div>
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="profile-details-toggle d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
                                    <span class="ms-2 rotate-180">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="svg-icon svg-icon-3">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
														</svg>
													</span>
                                        <!--end::Svg Icon-->
												</span></div>

                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Badge-->
                                    <div class="badge badge-light-info d-inline text-uppercase">{{$user->type}}</div>
                                    <!--begin::Badge-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Account ID</div>
                                    <div class="text-gray-600">ID-{{sprintf('%02d',$user->id)}}</div>
                                    <div class="fw-bold mt-5">Price <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_2"><i class="fa fa-pencil"></i></a></div>
                                    <div class="text-gray-600 price-text">{{number_format($user->price,2)}}€</div>
                                    <div class="fw-bold mt-5">Birthday</div>
                                    <div class="text-gray-600">{{date('d/m/Y',strtotime($user->dob))}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="mailto:{{$user->email}}" class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                    </div>
                                    <div class="fw-bold mt-5">Phone</div>
                                    <div class="text-gray-600">
                                        <a href="tel:{{$user->phone}}" class="text-gray-600 text-hover-primary">{{$user->phone}}</a>
                                    </div>
                                    <div class="fw-bold mt-5">Company</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$user->company_name}}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Billing Address</div>
                                    <div class="text-gray-600">
                                        {{$user->company_address}} {{$user->zip_code}}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Experiences</div>
                                    <div class="text-gray-600">{{$user->experience_1}}</div>
                                    <div class="text-gray-600">{{$user->experience_2}}</div>
                                    <div class="text-gray-600">{{$user->experience_3}}</div>
                                    <div class="text-gray-600">{{$user->experience_4}}</div>

                                    <div class="fw-bold mt-5">Training</div>
                                    <div class="text-gray-600">{{$user->training_1}}</div>
                                    <div class="text-gray-600">{{$user->training_2}}</div>
                                    <div class="text-gray-600">{{$user->training_3}}</div>
                                    <div class="text-gray-600">{{$user->training_4}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Verified</div>
                                    <div class="text-gray-600">

                                    @if($user->verify_status=='verified')
                                            <div class="badge badge-light-success d-inline">Verified</div>
                                        @else
                                            <div class="badge badge-light-danger d-inline">Not Verified</div>
                                    @endif

                                    </div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Connected Accounts-->

                    <!--end::Connected Accounts-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="profile-main flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="profile-main-tabs nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Overview</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab">Cities</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Statements</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item ms-auto">
                            <!--begin::Action menu-->
                            <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-2 me-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
												</svg>
											</span>
                                <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{route('delete-user',$user->id)}}" class="menu-link text-danger px-5">Delete customer</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                          @if($user->verify_status!='verified')
                                <div class="alert alert-danger d-flex justify-content-between"><span>This user is not verified yet.</span> <a class="btn btn-sm btn-primary" href="{{route('verify-now',$user->id)}}">Verify Now</a></div>

                            @endif
                            <div class="about-card card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Bookings</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->

                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-100px">Booking No.</th>
                                            @if($user->type=='examiner')
                                                <th>User</th>
                                            @else
                                                <th>Examiner</th>
                                            @endif
                                            <th>Amount</th>
                                            <th class="min-w-100px">Date</th>
                                            <th class="text-end min-w-100px pe-4">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <!--begin::Table row-->
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>1</td>
                                                <!--begin::Invoice=-->
                                                <td class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    @if($user->type=='examiner')
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                      @if($booking->user)
                                                            <a href="{{route('admin.profile',$booking->user->id)}}">
                                                                <div class="symbol-label">
                                                                    <img src="{{$booking->user->image}}" alt="{{$booking->user->name}}" class="w-100">
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="#">
                                                                <div class="symbol-label">
                                                                  No User
                                                                </div>
                                                            </a>
                                                      @endif
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        @if($booking->user)
                                                        <a href="{{route('admin.profile',$booking->user->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$booking->user->name}}</a>
                                                        <span>{{$booking->user->email}}</span>
                                                        @else
                                                            <a href="#">
                                                                <div class="symbol-label">
                                                                    No User
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @else
                                                        @if($booking->examiner)
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a href="{{route('admin.profile',$booking->examiner->id)}}">
                                                                    <div class="symbol-label">
                                                                        <img src="{{$booking->examiner->image}}" alt="{{$booking->examiner->name}}" class="w-100">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::User details-->
                                                            <div class="d-flex flex-column">
                                                                <a href="{{route('admin.profile',$booking->examiner->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$booking->examiner->name}}</a>
                                                                <span>{{$booking->examiner->email}}</span>
                                                            </div>
                                                        @endif

                                                    @endif
                                                    <!--begin::User details-->
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->

                                                <!--end::Status=-->
                                                <!--begin::Amount=-->
                                                <td>{{number_format($booking->price,2)}}€</td>
                                                <!--end::Amount=-->
                                                <!--begin::Date=-->
                                                <td>{{date('d M Y, H:i a',strtotime($booking->created_at))}}</td>
                                                <!--end::Date=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																		</svg>
																	</span>
                                                        <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" data-id="{{$booking->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="menu-link px-3 btn-order-details">View</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{route('booking.delete',$booking->id)}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                        @endforeach

                                        <!--end::Table row-->

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="balance-card card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold mb-0">About</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->

                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <p>{!! $user->about_me !!}</p>
                                    </div>

                                    <!--end::Option-->


                                    <!--end::Option-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold">Credit Balance</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_adjust_balance">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
															</svg>
														</span>
                                            <!--end::Svg Icon-->Adjust Balance</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fw-bold fs-2">{{$user->balance}}€
                                        <span class="text-muted fs-4 fw-semibold">EUR</span>
                                        <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on the customer's next invoice.</div></div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Reviews</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Tab Content-->

                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                            @foreach(examiner_review($user->id) as $review)
                                                @if($review->user)
                                                    <div class="profile-review-item">
                                                        <div class="profile-review-header">
                                                            <h6>{{$review->user->name}}</h6>
                                                            <div class="profile-review-star ms-auto">
                                                                <div class="d-flex align-items-center gap-2 me-3">
                                                                    <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                                    <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                                    <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                                    <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                                    <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                                </div>
                                                                <p>{{$review->rating_with_examiner}}/5</p>
                                                                 <a href="{{route('delete-review',$review->id)}}" class="btn btn-delete-review  btn-icon btn-bg-light btn-active-color-primary btn-sm" >
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                    <span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="profile-review-desc">
                                                            <p>“{{$review->rating_about_examiner}}”</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>


                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Cities</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#"  data-bs-target="#kt_modal_1" class="btn btn-sm btn-flex btn-light-primary btn-new-city" data-bs-toggle="modal" >
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
															</svg>
														</span>
                                            <!--end::Svg Icon-->New City</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-0">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                            <!--begin::Table body-->
                                            <tbody id="cities">
                                            <!--begin::Table row-->
                                            @foreach($user->cities as $city)
                                            <tr>




                                                <td class="min-w-50px d-flex justify-content-between">
                                                    <span>{{$city->name}}</span>
                                                <span class=""><a data-bs-toggle="modal" class="btn-edit-city" data-bs-target="#kt_modal_1" data-id="{{$city->id}}" data-name="{{$city->name}}" href="#"><i class="fa fa-pencil"></i></a></span>
                                                </td>

                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px"> {{date('d M Y, H:i a',strtotime($city->created_at))}}</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            @endforeach
                                            <!--end::Table row-->

                                            <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                            <!--begin::Earnings-->

                            <!--end::Earnings-->
                            <!--begin::Statements-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <h2>Statement</h2>
                                    </div>
                                    <!--end::Title-->

                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body pb-5">
                                    <!--begin::Tab Content-->

                                            <!--begin::Table-->
                                            <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                                <!--begin::Table head-->
                                                <thead class="border-bottom border-gray-200">
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-125px">Date</th>
                                                    <th class="w-100px">Txid</th>
                                                    <th class="w-300px">Details</th>
                                                    <th class="w-100px">Amount</th>
                                                    <th class="w-100px text-end pe-7">Invoice</th>
                                                </tr>
                                                <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                @foreach($transactions as $tx)
                                                    <tr>
                                                        <td>{{date("d M Y, H:i a",strtotime($tx->created_at))}}</td>
                                                        <td>
                                                            <a href="#" class="text-gray-600 text-hover-primary">{{sprintf('%05d',$tx->id)}}</a>
                                                        </td>
                                                        <td>{{$tx->desc}}</td>
                                                        <td class="text-success">{{$tx->amount}}</td>
                                                        <td class="text-end">
                                                            <a href="{{route('delete-transaction',$tx->id)}}" class="btn btn-sm btn-light btn-active-light-primary">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach



                                                </tbody>
                                                <!--end::Table body-->
                                            </table>

                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Statements-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <!--begin::Modals-->
            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">City</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="city">City</label>
                                    <input id="city" type="text" class="form-control city-name" placeholder="Examiner City">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-save-city btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" id="kt_modal_2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Price</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                         <div class="row">
                             <div class="form-group col-md-12">
                                 <label>Price</label>
                                 <input type="text" name="price" value="{{$user->price}}" class="price form-control">
                             </div>
                         </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light " data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-save-price">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal - New Card-->
            <!--begin::Modal - Adjust Balance-->
            <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Adjust Balance</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                            <!--begin::Balance preview-->
                            <div class="d-flex text-center mb-9">
                                <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                    <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance</div>
                                    <div class="fs-2 fw-bold" kt-modal-adjust-balance="current_balance">US {{number_format($user->balance,2)}}</div>
                                </div>
                                <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                    <div class="fs-6 fw-semibold mb-2 text-muted">New Balance
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter an amount to preview the new balance."></i></div>
                                    <div class="fs-2 fw-bold" id="new_balance">--</div>
                                </div>
                            </div>
                            <!--end::Balance preview-->
                            <!--begin::Form-->
                            <form id="kt_modal_adjust_balance_form" method="post" class="form" action="{{route('adjust-balance')}}">
                                <!--begin::Input group-->

                                <input type="hidden" name="id" value="{{$user->id}}">
                                @csrf
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="kt_modal_inputmask" type="text" class="form-control balance-amount form-control-solid" name="amount" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mb-2">Add adjustment note</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="desc" class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Disclaimer-->
                                <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be audited by the financial team every fortnight. Please maintain your invoices and receipts until then. Thank you.</div>
                                <!--end::Disclaimer-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">Discard</button>
                                    <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
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
            <!--end::Modal - New Card-->

            <!--end::Modal - New Card-->
            <!--end::Modals-->
        </div>
    <div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="booking_detail">

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/custom/apps/customers/update.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var cityid="";

        var element;
        $('.btn-edit-city').on('click',function(e){
            cityid=$(this).attr('data-id');
            var name=$(this).attr('data-name');
            $('.city-name').val(name);
            element=$(this);
        })
        $('.btn-new-city').on('click',function(e){
            cityid="";
            $('.city-name').val('');
        })
        $('.btn-save-city').on('click',function(e){
            var name=$('.city-name').val();

            if(name==""){
                toastr.error('Please enter city name...');
                return;
            }
            $.ajax({
                url:"{{route('admin.update-city')}}",
                type:"POST",
                data:{userid:"{{$user->id}}",id:cityid,name:name},
                success:function(data){
                    cityid="";
                    toastr.success(data.message);
                    console.log($(element).parent());
                    $(element).parent().parent().children().eq(0).text(name);
                    $('#kt_modal_1').modal('hide');
                    if(data.type=='new'){
                        setTimeout(function(){
                            window.location.reload();
                        },2000)
                        $('#cities').append('')
                    }
                },
                error:function(error){

                }
            })
        });
        $('.btn-save-price').on('click',function(e){
            var price=$('.price').val();


            $.ajax({
                url:"{{route('admin.update-price')}}",
                type:"POST",
                data:{id:"{{$user->id}}",price:price},
                success:function(data){
                    cityid="";
                    toastr.success(data.message);
                    console.log($(element).parent());
                    $('.price-text').text(data.price);
                    $(element).parent().parent().children().eq(0).text(name);
                    $('#kt_modal_2').modal('hide');
                },
                error:function(error){

                }
            })
        })
        $('.btn-delete-review').on('click',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=href;
                    Swal.fire(
                        'Deleted!',
                        'Review has been deleted.',
                        'success'
                    )
                }
            })
        })
        $(document).on('click','.btn-order-details',function(e){
            e.preventDefault();
            var id=$(this).attr('data-id');
            $.ajax({
                url:"{{url('order')}}/"+id,
                type:"GET",
                data:{},
                success:function(data){
                    $('#booking_detail').html(data);
                },
                error:function(erorr){

                }
            })
        });
        $('.balance-amount').on('keyup',function(){
            var newBalance=$(this).val();
            $('#new_balance').text(newBalance);
        });
        $('#kt_modal_adjust_balance_form').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    toastr.success(data.message);
                    $('#kt_modal_adjust_balance').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    toastr.error(xhr.responseJSON.message);
                }
            });
        })
    </script>
    @endsection
