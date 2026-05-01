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
    </style>
@endsection
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Examinations</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Examinations</li>
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
                                                <label class="form-label fw-semibold">Date range</label>
                                                <input class="form-control date_range" placeholder="Pick date range" id="kt_daterangepicker_4"/>
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

                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table table-hover align-middle w-100" id="kt_table_users">
                            <thead>
                            <tr class="text-start fw-bold text-uppercase table-light">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="">User</th>
                                <th class="">Title</th>
                                <th class="">Price</th>
                                <th class="">Marke & Modell</th>
                                <th class="">Examiner</th>
                                <th class="">Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

    <div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="booking_detail">

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="assign_examiner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Assign Examiner</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 form-group">
                            {{--                           <select class="form-select form-select-solid" id="select-examiner" data-placeholder="Select an option">--}}
                            {{--                               <option></option>--}}

                            {{--                           </select>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="email" placeholder="Examiner Emmail" name="email" id="examiner_email" class="form-control form-control-solid">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-assign-examiner-now">Assign Examiner</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script>
        var examinerAssign='{{route('examiners.assign')}}';
    </script>

    @if (session()->has('errors'))
        <script>
            setTimeout(function (){
                $('#kt_add_booking').modal('show');
            },300)
        </script>
    @endif
    <script src="{{ asset('custom/examinations.js') }}"></script>


    <script>
        var start = moment().subtract(2000, "days");
        var end = moment();

        function cb(start, end) {
            $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        }

        $("#kt_daterangepicker_4").daterangepicker({
            startDate: start,
            endDate: end.add(30,"days"),
            ranges: {
                "Today": [moment(), moment()],
                "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        }, cb);


        $(document).on('click','.btn-close-modal',function (){
            $('#kt_modal_add_user').modal('hide');
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
    </script>

    <script>
        $("#select-examiner").select2({
            dropdownParent: $('#assign_examiner'),
            ajax: {
                url: '{{route('examiners.fetch')}}',
                dataType: "json",
                type: "GET",
                data: function (params) {

                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });


    </script>
    {{--    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/add.js') }}"></script>--}}
@endsection
