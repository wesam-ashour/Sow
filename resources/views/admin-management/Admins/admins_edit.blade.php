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
                    <li class="breadcrumb-item text-muted">@lang('web.Admins Management')</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">@lang('web.Admins')</li>
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
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card card-flush py-4 mb-10">
                        <!--begin::Card body-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>@lang('web.Avatar')</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <div class="card-body text-center pt-0">
                            <!--begin::Summary-->
                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                         data-kt-image-input="true"
                                         style="background-image: url({{asset("images/users/".$user->personalphoto)}})">
                                        <!--begin::Preview existing avatar-->
                                        <div id="uploaded_image" data-value="{{$user->personalphoto}}"
                                             class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{asset("images/users/".$user->personal_photo)}});"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                               data-kt-image-input-action="change"
                                               data-bs-toggle="tooltip" title="{{__("web.Change avatar")}}">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input id="image_file_input" type="file" name="avatar"
                                                   accept=".png, .jpg, .jpeg" value="{{$user->personalphoto}}"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="cancel"
                                              data-bs-toggle="tooltip" title="{{__("web.Cancel avatar")}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="remove"
                                              data-bs-toggle="tooltip" title="{{__("web.Remove avatar")}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="text-muted fs-7">{{__("web.Allowed file types: png, jpg, jpeg.")}}</div>
                                    <!--end::Hint-->
                                </div>
                            </div>
                            <!--end::User Info-->
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="text-start">
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                         href="#kt_user_view_details" role="button" aria-expanded="false"
                                         aria-controls="kt_user_view_details">{{__("web.Details")}}
                                        <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                      fill="black"/>
															</svg>
														</span>
                                            <!--end::Svg Icon-->
													</span></div>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator"></div>
                                <!--begin::Details content-->
                                <div id="kt_user_view_details" class="collapse show">
                                    <div class="pb-5 fs-6">
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">{{__("web.Account ID")}}</div>
                                        <div class="text-gray-600">ID-{{$user->id}}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">{{__("web.Email")}}</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                               class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                        </div>
                                        <div class="fw-bolder mt-5">{{__("web.Mobile")}}</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                               class="text-gray-600 text-hover-primary">{{$user->mobile_number}}</a>
                                        </div>
                                        <!--begin::Details item-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
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
                                            <label class="required fw-bold fs-6 mb-2">{{__("web.Mobile")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="mobile" type="number" name="mobile"
                                                   class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="@lang('web.Mobile')"
                                                   value="{{$user->mobile_number}}"/>
                                            <strong id="mobile_error" class="errors text-danger"
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
                                        <div class="mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-5">{{__("web.Select Role")}}</label>
                                            <!--end::Label-->
                                            <!--begin::Roles-->
                                            @php
                                                $role_id = "";
                                            @endphp
                                        @foreach($roles as $k=>$role)
                                            @if($role->id != 71 )
                                                <!--begin::Input row-->
                                                    <div class="d-flex fv-row">
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="radio_roles form-check-input me-3"
                                                                   name="user_role" type="radio"
                                                                   value="{{$role->id}}"
                                                                   data-name="{{$role->name}}"
                                                                   data-id="{{$role->id}}"
                                                                   id="kt_modal_update_role_option_{{$role->id}}"
                                                                {{$role->id == $user->roles_id ? "checked":""}}/>
                                                        @if($k == 0 && $user->roles_id != "")
                                                            <input id="first_role"
                                                                   data-id="{{$role->id}}"
                                                                   data-name="{{$role->name}}"
                                                                   type="hidden" value="{{$role->id}}">
                                                        @endif
                                                        <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label"
                                                                   for="kt_modal_update_role_option_0">
                                                                <div class="fw-bolder text-gray-800">
                                                                    {{$role->name}}
                                                                </div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input row-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                    <!--begin::Input row-->
                                            @endif
                                        @endforeach
                                        <!--end::Roles-->
                                        </div>
                                        <strong id="roles_id_error"
                                                class="errors text-danger"
                                                role="alert">
                                        </strong>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </form>
                        </div>
                        <div class="d-flex justify-content-end p-5 mb-2">
                            <a href="{{ route('admins.index') }}"
                               id="kt_ecommerce_edit_user_cancel" class="btn btn-light me-5">@lang('web.Discard')</a>
                            <button id="kt_modal_update_user_submit" class="btn btn-primary">
                                <span class="indicator-label">@lang('web.Submit')</span>
                                <span class="indicator-progress">@lang('web.Please wait...')
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

            <!--end::Actions-->
            <!--end::Layout-->
            <!--begin::Modals-->
            <!--begin::Modal - Update user details-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <!--begin::Vendors Javascript(used for this page only)-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('pages/js/admin-management/admin/update.js')}}" defer></script>
@endsection
