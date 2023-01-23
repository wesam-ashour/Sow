<!--begin::Aside Menu-->
@php
    $language = config('app.locale');
    $url = \Illuminate\Support\Facades\URL::current();
    $previous_url = \Illuminate\Support\Facades\URL::previous();
@endphp
    <!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <div class="aside-logo flex-column-auto" id="kt_aside_logo">
            <!--begin::Logo-->
            <a href="{{route('dashboard.index')}}" style="color: white;font-size: 20px;">
                Dashboard Admin Panel
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                @can('dashboard_view')
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{url('dashboard')}}"><span
                                class="menu-link {{str_contains($url,"dashboard") ? "active":""}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect x="2" y="2" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">@lang('web.dashboard')</span>
										</span></a>
                        <!--end:Menu link.-->
                    </div>
                    <!--end:Menu item.-->
                @endcan
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">@lang('web.Pages')</span>
                    </div>
                    <!--end:Menu content.-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{str_contains($url,"admins") || str_contains($url,"roles") || str_contains($url,"permissions") || str_contains($url,"passengers") ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    @if(\Illuminate\Support\Facades\Auth::user()->hasAnyPermission(['admins_view','drivers_view','passengers_view','roles_view']))

                    <span class="menu-link">

                            <span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                                            fill="currentColor"/>
														<path opacity="0.3"
                                                              d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                <!--end::Svg Icon-->
											</span>
                            <span class="menu-title">@lang('web.Users Management')</span>
                            <span class="menu-arrow"></span>
										</span>
                    @endif

                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        @can('admins_view')
                            <div data-kt-menu-trigger="click"
                                 class="menu-item menu-accordion mb-1 {{str_contains($url,"admins") ? "hover show":""}} ">
                                <!--begin:Menu link-->
                                <a href="{{url("admins")}}"><span
                                        class="menu-link {{str_contains($url,"admins") ? "active":""}} ">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">@lang('web.Admins')</span>

												</span>
                                </a>
                                <!--end:Menu link-->

                            </div>
                        @endcan
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        @can('roles_view')
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{url("roles")}}"><span
                                        class="menu-link {{str_contains($url,"roles") ? "active":""}}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">@lang('web.Roles')</span>

												</span>
                                </a>
                                <!--end:Menu link-->

                            </div>
                        @endcan
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>

                <div class="menu-item menu-accordion {{str_contains($url,"drivers ")  ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    <a class="menu-link {{str_contains($url,"drivers") ? "active":""}}"
                       href="{{route('drivers.index')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="bi bi-car-front"></i>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                        <span class="menu-title">@lang('web.drivers')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item menu-accordion {{str_contains($url,"orders")  ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    <a class="menu-link {{str_contains($url,"orders") ? "active":""}}"
                       href="{{route('orders.index')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="bi bi-card-checklist"></i>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                        <span class="menu-title">@lang('web.Orders')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item menu-accordion {{str_contains($url,"ScanQR")  ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    <a class="menu-link {{str_contains($url,"•	ScanQR") ? "active":""}}"
                       href="{{route('ScanQR.index')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="bi bi-qr-code-scan"></i>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                        <span class="menu-title">@lang('web.ScanQR')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item menu-accordion {{str_contains($url,"locations")  ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    <a class="menu-link {{str_contains($url,"•	locations") ? "active":""}}"
                       href="{{route('locations.index')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="bi bi-house"></i>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                        <span class="menu-title">@lang('web.manage_locations')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <br>
                <br>
                <br>
                <div class="menu-item menu-accordion {{str_contains($url,"Sign Out")  ? "hover show":""}} ">
                    <!--begin:Menu link-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="menu-link"
                           href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<i class="bi bi-box-arrow-left"></i>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                            <span class="menu-title">@lang('web.Sign Out')</span>
                        </a>
                    </form>
                    <!--end:Menu link-->
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
