@extends('layouts.master')
@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.Admin List')</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a class="text-muted text-hover-primary">@lang('web.dashboard1')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">@lang('web.User Management')</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">@lang('web.Users')</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row p-5">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tab content-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__("web.Profile")}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div id="kt_modal_edit_user" class="card-body pt-0 pb-5">
                            <form id="kt_modal_edit_user_form" data-kt-redirect="">
                                <!--begin::Scroll-->
                                <div id="kt_modal_edit_user_scroll">
                                    <!--begin::Input group-->
                                    <input id="user_id" type="hidden" value="{{$user->id}}">
                                    <div class="row">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">{{__("web.Full Name")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="name" type="text" name="name"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="@lang('web.Full Name')" value="{{$user->full_name}}"/>
                                            <strong id="name_error" class="errors text-danger"
                                                    role="alert">
                                            </strong>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">{{__("web.Email")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="email" type="email" name="email"
                                                   class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="@lang('web.Email')" value="{{$user->email}}"/>
                                            <strong id="email_error" class="errors text-danger"
                                                    role="alert">
                                            </strong>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">{{__("web.Password")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="password" type="password" name="password"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="********" value=""/>
                                            <strong id="password_error" class="errors text-danger"
                                                    role="alert">
                                            </strong>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="col-md-6 mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">{{__("web.Confirm Password")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="password_confirmation" type="password"
                                                   name="password_confirmation"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="********" value=""/>
                                            <strong id="password_confirmation_error"
                                                    class="errors text-danger"
                                                    role="alert">
                                            </strong>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </form>
                        </div>
                        <div class="d-flex justify-content-end p-5 mb-2">
                            <a href="{{ route('dashboard.index') }}"
                               id="kt_ecommerce_edit_user_cancel" class="btn btn-light me-5">{{__("web.Discard")}}</a>
                            <button id="kt_modal_update_user_submit" class="btn btn-primary">
                                <span class="indicator-label">{{__("web.Save Changes")}}</span>
                                <span class="indicator-progress">{{__("web.Please wait...")}}
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <!--begin::Vendors Javascript(used for this page only)-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('pages/js/admin-management/admin/update-profile.js')}}" defer></script>
@endsection
