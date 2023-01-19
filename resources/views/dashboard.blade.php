@extends('layouts.master')
@section('content')
    <style>
        .dot {
            margin: 1px 1px 1px 20px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #648fc5;
        }

        .dot2 {
            margin: 1px 2px 1px 50px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #5eab97;
        }

        .dot3 {
            margin: 1px 2px 1px 50px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #A45976;
        }

        .dot4 {
            margin: 1px 1px 1px 10px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #A45976;
        }

        .dot5 {
            margin: 1px 10px 1px 10px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #5eab97;
        }

        .dot6 {
            margin: 1px 10px 1px 10px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            background-color: #648fc5;
        }
    </style>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.dashboard')</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">@lang('web.Home')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">@lang('web.dashboard')</li>
                    <!--end::Item-->
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
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a class="card-title fw-bold text-primary fs-5 mb-3 d-block">@lang('web.Total system users')</a>
                                <span class="text-dark fs-1 fw-bold me-2">{{$users}}</span>

                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px"
                                 fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                        </div>
                        <!--end:: Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a class="card-title fw-bold text-primary fs-5 mb-3 d-block">@lang('web.Passengers')</a>
                                <span class="text fs-1 fw-bold me-2" style="color: #ceb115 !important">{{$totalPassengers}}%</span>

                            </div>
                            <span class="text-dark fs-1 fw-bold me-2">{{$passengers}}</span>
                        </div>
                        <!--end:: Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a class="card-title fw-bold text-primary fs-5 mb-3 d-block">@lang('web.Drivers')</a>
                                <span class="text fs-1 fw-bold me-2" style="color: #ceb115 !important">{{$totalDrivers}}%</span>

                            </div>
                            <span class="text-dark fs-1 fw-bold me-2">{{$drivers}}</span>
                        </div>
                        <!--end:: Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.1/Chart.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var data1 = [];
        var data2 = [];
        var data3 = [];
        var labels = [];
    </script>
    <script type="text/javascript">
        $('.apply').click(function () {
            data1 = [];
            data2 = [];
            data3 = [];
            labels = [];
            var start = $("#start_date").val();
            var end = $("#end_date").val();
            if (start == "" || end == "") {
                Swal.fire({
                    icon: 'error',
                    title: '@lang('web.Sorry')',
                    text: '@lang('web.The start and end date must be added !')',
                    footer: ''
                })
            } else {
                let chartStatus = Chart.getChart("myBarChart"); // <canvas> id
                if (chartStatus != undefined) {
                    chartStatus.destroy();
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                Chart.defaults.font.size = 18;
                const data = {
                    labels: labels,
                    datasets: [{
                        label: '@lang('web.requested')',
                        data: data1,
                        fill: false,
                        borderColor: '#648fc5',
                        tension: 0.1,
                    }, {
                        label: '@lang('web.Accepted')',
                        data: data2,
                        fill: false,
                        borderColor: '#5eab97',
                        tension: 0.1
                    }, {
                        label: '@lang('web.rejected')',
                        data: data3,
                        fill: false,
                        borderColor: '#A45976',
                        tension: 0.1
                    }]
                };
                var ctx = document.getElementById("myBarChart");
                var myLineChart1 = new Chart(ctx, {
                    type: 'line',
                    data: data,
                });

                $.ajax({
                    type: 'get',
                    url: '/search/statistics/',
                    data: {start: start, end: end},
                    success: function (data) {
                        if (data.historyRequested.length > 0) {
                            jQuery.each(data.historyRequested, function (index, item) {
                                labels.push(item);
                            });
                            jQuery.each(data.countRequested, function (index, item) {
                                data1.push(item);
                            });
                            jQuery.each(data.countAccepted, function (index, item) {
                                data2.push(item);
                            });
                            jQuery.each(data.countRejected, function (index, item) {
                                data3.push(item);
                            });
                            myLineChart1.update();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '@lang('web.Sorry')',
                                text: '@lang('web.No data founded!')',
                                footer: ''
                            });
                            startFun();
                        }
                    }
                });
            }
        })
    </script>
    <script>
        window.onload = function () {
            startFun();
        };

        function startFun() {
            let chartStatus = Chart.getChart("myBarChart"); // <canvas> id
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            Chart.defaults.font.size = 18;
            const data = {
                labels: labels,
                datasets: [{
                    label: '@lang('web.requested')',
                    data: data1,
                    fill: false,
                    borderColor: '#648fc5',
                    tension: 0.1,
                }, {
                    label: '@lang('web.Accepted')',
                    data: data2,
                    fill: false,
                    borderColor: '#5eab97',
                    tension: 0.1
                }, {
                    label: '@lang('web.rejected')',
                    data: data3,
                    fill: false,
                    borderColor: '#A45976',
                    tension: 0.1
                }]
            };
            var ctx = document.getElementById("myBarChart");
            var myLineChart1 = new Chart(ctx, {
                type: 'line',
                data: data,
            });
            $.ajax({
                type: "GET",
                url: '/dashboard/statistics/',
                data: {statistics: 1},
                dataType: 'json',
                success: function (data) {
                    jQuery.each(data.historyRequested.slice(0, 10), function (index, item) {
                        labels.push(item);
                    });
                    jQuery.each(data.countRequested.slice(0, 10), function (index, item) {
                        data1.push(item);
                    });
                    jQuery.each(data.countAccepted.slice(0, 10), function (index, item) {
                        data2.push(item);
                    });
                    jQuery.each(data.countRejected.slice(0, 10), function (index, item) {
                        data3.push(item);
                    });
                    myLineChart1.update();
                },
                error: function (data) {
                },
            });
        }
    </script>
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/index.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/xy.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/percent.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/radar.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/themes/Animated.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/map.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/geodata/worldLow.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/geodata/continentsLow.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/geodata/usaLow.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js')}}" defer></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js')}}" defer></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" defer></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->

    <script src="{{asset('assets/js/custom/widgets.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/new-target.js')}}" defer></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}" defer></script>
    <!--end::Custom Javascript-->

@endsection
