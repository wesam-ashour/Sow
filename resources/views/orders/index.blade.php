@extends('layouts.master')
@section('content')
    <style>
        #file-chosens {
            margin-left: 0.3rem;
            font-family: sans-serif;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.order_list')</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                  height="2" rx="1"
                                                                  transform="rotate(45 17.0365 15.1223)"
                                                                  fill="currentColor"/>
															<path
                                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                fill="currentColor"/>
														</svg>
													</span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-forms-filter="search"
                                   class="form-control form-control-solid w-250px ps-15"
                                   placeholder="@lang('web.Search Here')"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_orders_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.order_number')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.name')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.email')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.status')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.driver')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.delivery_date')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.payment_status')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.Actions')</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - Update permissions-->
            <div class="modal fade" id="kt_modal_show_orders" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">@lang('web.Order_Details')</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                 id="cancel_modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                      height="2" rx="1"
                                                                      transform="rotate(-45 6 17.3137)"
                                                                      fill="currentColor"/>
																<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                      transform="rotate(45 7.41422 6)"
                                                                      fill="currentColor"/>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Notice-->
                            <!--end::Notice-->
                            <!--begin::Form-->
                            <form id="kt_modal_detail_car_form" class="form" action="#" style="font-size: 15px;">
                                @csrf
                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                     id="kt_modal_detail_car_scroll" data-kt-scroll="true"
                                     data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_detail_car_header"
                                     data-kt-scroll-wrappers="#kt_modal_detail_car_scroll"
                                     data-kt-scroll-offset="300px">
                                    <input type="hidden" name="news_edit_id" id="news_edit_id">
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.order_number') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="order_number_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.name') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="name_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.Mobile') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="phone_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.email') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="email_show"></span>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.governorate') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="governorate_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.city') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="city_show"></span>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.block') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="block_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.jadda') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="jadda_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.street') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="street_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.house') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="house_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.driver') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="driver_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.assigned_driver') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="assigned_driver_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.status') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="status_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.assigned_status') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="assigned_status_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.payment_status') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="payment_status_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.date_payment') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="date_payment_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.TrackID') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="TrackID_show"></span>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span style="font-weight: bold">@lang('web.PaymentID') :</span>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <span id="PaymentID_show"></span>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-15">
                                    <button type="button" class="btn btn-light me-3"
                                            id="close_modal">@lang('web.Discard')</button>
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
            <!--end::Modal - Update permissions-->
            <!--end::Modals-->
        </div>
        <!--end::Content container-->
        <input type="hidden" id="trans" value="{{trans('web.Selected')}}">
    </div>
    <!--end::Content-->
@endsection
@section('js')

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" defer></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('pages/js/admin-management/orders/list.js')}}" defer></script>
    <script src="{{asset('pages/js/admin-management/orders/index.js')}}" defer></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--end::Custom Javascript-->
    <script>
        $(function () {

            $(document).on('click', '#close_modal', function () {
                $('#kt_modal_show_orders').modal('hide');
            });
            $(document).on('click', '#cancel_modal', function () {
                $('#kt_modal_show_orders').modal('hide');
            });
        });
    </script>
    <script>
        $(function () {

            $(document).on('click', '#show', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: "/orders/" + id,
                    data: {"id":id},
                    success: function (response) {
                        $("#order_number_show").html(response.order.order_number);
                        $("#name_show").html(response.order.name);
                        $("#phone_show").html(response.order.phone);
                        $("#email_show").html(response.order.email);
                        $("#governorate_show").html(response.order.governorate);
                        $("#city_show").html(response.order.city);
                        $("#block_show").html(response.order.block);
                        $("#jadda_show").html(response.order.jadda);
                        $("#street_show").html(response.order.street);
                        $("#house_show").html(response.order.house);
                        $("#driver_show").html(response.driver);
                        $("#assigned_driver_show").html(response.assigned_driver);
                        $("#status_show").html(response.status);
                        $("#assigned_status_show").html(response.assigned_status);
                        $("#payment_status_show").html(response.payment_status);
                        $("#date_payment_show").html(response.order.date_payment);
                        $("#TrackID_show").html(response.order.TrackID);
                        $("#PaymentID_show").html(response.order.PaymentID);
                    },
                });

            });
        });


        function ChangeSelect(el) {
                var id = el.id;
                var value = el.value;
                if (value == 4) {
                    jQuery("#" + id).attr('disabled', true);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: $('#app_url').val() + '/' + $('#language').val() + '/changeStatus/order/',
                    data: {"id": id, "value": value},
                    success: function (data) {
                        Swal.fire(
                            '@lang('web.Status changed successfully')',
                            '',
                            'success'
                        )
                    }
                });
        }

        function ChangeSelectUser(el) {
                var id = el.id;
                var value = el.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: $('#app_url').val() + '/' + $('#language').val() + '/changeUser/order/',
                    data: {"id": id, "value": value},
                    success: function (data) {
                        Swal.fire(
                            '@lang('web.Driver assigned successfully')',
                            '',
                            'success'
                        )
                    }
                });
        }

        function delivery_date(el){
            var id = el.id;
            var value = el.value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                dataType: "json",
                url: $('#app_url').val() + '/' + $('#language').val() + '/delivery_date',
                data: {"id": id, "value": value},
                success: function (data) {
                    Swal.fire(
                        '@lang('web.Delivery date added successfully')',
                        '',
                        'success'
                    )
                }
            });
        }

    </script>
    <!--end::Javascript-->
@endsection
