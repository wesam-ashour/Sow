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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.locations_list')</h1>
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
                    <div class="card-toolbar">
                        <!--begin::Button-->
                            <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_location">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                <span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                              fill="currentColor"/>
														<rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                              transform="rotate(-90 10.8891 17.8033)"
                                                              fill="currentColor"/>
														<rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                <!--end::Svg Icon-->@lang('web.Add_Location')
                            </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_locations_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.ID')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.name')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.Types')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.governorate_fk_city')</th>
                            <th class="@if(\Illuminate\Support\Facades\App::getLocale() == "en") text-gray-900  min-w-125px @else text-start @endif">@lang('web.Price')</th>
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
            <div class="modal fade" id="kt_modal_update_location" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered modal-ml">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">@lang('web.Edit_location')</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                 data-kt-permissions-modal-actions="close">
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
                            <form id="kt_modal_update_location_form" class="form" action="#" enctype="multipart/form-data"
                                  style="font-size: 15px;">
                                @csrf
                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                     id="kt_modal_detail_car_scroll" data-kt-scroll="true"
                                     data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_detail_car_header"
                                     data-kt-scroll-wrappers="#kt_modal_detail_car_scroll"
                                     data-kt-scroll-offset="300px">
                                    <input type="hidden" name="location_edit_id" id="location_edit_id">
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="fv-row col-12 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.Name')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="name_edit" type="text" class="form-control form-control-solid"
                                                   placeholder="@lang('web.Enter Here')" name="name_edit">
                                            <strong id="name_edit_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row col-12 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.Types')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select id="type_edit" class="form-control form-control-solid" name="type_edit">
                                                <option value="Governorate">@lang('web.Governorate')</option>
                                                <option value="City">@lang('web.City')</option>
                                            </select>
                                            <strong id="type_edit_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row col-12 mb-7 governorate_fk_city_edit" id="governorate_fk_city_edit"
                                             style="display: none">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.governorate_fk_city')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select id="governorate_fk_city_edit" class="form-control form-control-solid" name="governorate_fk_city_edit">
                                                <option></option>
                                                @foreach(getGovernorate() as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            <strong id="type_edit_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>

                                        <div class="fv-row col-12 mb-7 priceLocation_edit" id="priceLocation_edit"
                                             style="display: none">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.priceLocation')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="price_edit" id="price_edit" class="form-control form-control-solid" type="number">
                                            <strong id="price_edit_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>



                                    </div>

                                </div>
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                            data-kt-permissions-modal-actions="cancel">@lang('web.Discard')</button>
                                    <button type="submit" class="btn btn-primary"
                                            data-kt-permissions-modal-actions="submit">
                                        <span class="indicator-label">@lang('web.Submit')</span>
                                        <span class="indicator-progress">@lang('web.Please wait...')
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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


            <div class="modal fade" id="kt_modal_add_location" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered modal-ml">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">@lang('web.Add_Location')</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                 data-kt-permissions-modal-action="close">
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
                            <!--begin::Form-->
                            <form id="kt_modal_add_location_form" class="form" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                     id="kt_modal_detail_car_scroll" data-kt-scroll="true"
                                     data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_detail_car_header"
                                     data-kt-scroll-wrappers="#kt_modal_detail_car_scroll"
                                     data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="fv-row col-12 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.Name')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="name" type="text" class="form-control form-control-solid"
                                                   placeholder="@lang('web.Enter Here')" name="name">
                                            <strong id="name_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row col-12 mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.Types')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select id="type" class="form-control form-control-solid" name="type">
                                                <option value="Governorate">@lang('web.Governorate')</option>
                                                <option value="City">@lang('web.City')</option>
                                            </select>
                                            <strong id="type_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row col-12 mb-7 governorate_fk_city" id="governorate_fk_city"
                                             style="display: none">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.governorate_fk_city')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select id="governorate_fk_city" class="form-control form-control-solid" name="governorate_fk_city">
                                                <option ></option>
                                                @foreach(getGovernorate() as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            <strong id="governorate_fk_city_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row col-12 mb-7 priceLocation" id="priceLocation"
                                             style="display: none">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">@lang('web.priceLocation')</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                   data-bs-trigger="hover" data-bs-html="true"
                                                   data-bs-content="@lang('web.required')"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="price" id="price" class="form-control form-control-solid" type="number">
                                            <strong id="price_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Input-->
                                        </div>

                                    </div>

                                </div>

                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                            data-kt-permissions-modal-action="cancel">@lang('web.Discard')</button>
                                    <button type="submit" class="btn btn-primary"
                                            data-kt-permissions-modal-action="submit">
                                        <span class="indicator-label">@lang('web.Submit')</span>
                                        <span class="indicator-progress">@lang('web.Please wait...')
																<span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <script src="{{asset('pages/js/admin-management/locations/list.js')}}" defer></script>
    <script src="{{asset('pages/js/admin-management/locations/index.js')}}" defer></script>
    <script src="{{asset('pages/js/admin-management/locations/add-location.js')}}" defer></script>
    <script src="{{asset('pages/js/admin-management/locations/edit-location.js')}}" defer></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--end::Custom Javascript-->
    <script>
        $('#type').change(function () {
            if ($(this).val() === "City") {

                $("#priceLocation").css("display", "block");
                $("#governorate_fk_city").css("display", "block");

            } else {
                $("#priceLocation").css("display", "none");
                $("#governorate_fk_city").css("display", "none");


            }
        });

        $('#type_edit').change(function () {
            if ($(this).val() === "City") {

                $("#priceLocation_edit").css("display", "block");
                $("#governorate_fk_city_edit").css("display", "block");

            } else {
                $("#priceLocation_edit").css("display", "none");

            }
        });
    </script>
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

    </script>
    <!--end::Javascript-->
@endsection
