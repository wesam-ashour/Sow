@extends('layouts.master')
@section('css')
@endsection
<meta name="apple-mobile-web-app-capable" content="yes">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<input hidden name="lan" id="lan" value="{{\Illuminate\Support\Facades\App::getLocale()}}">
<script src="{{asset('assets/js/html5-qrcode.min.js')}}"></script>
<script>
    const app_url = $('#app_url').val(),
        language = $('#lan').val();
    $( document ).ready(function() {
        $( "#Request" ).text( language === "en" ? "Request Camera Permissions" : "طلب أذونات الكاميرا" );
        $( "#start" ).text( language === "en" ? "Start Scanning" : "ابدأ المسح" );
        $( "#stop" ).text( language === "en" ? "Stop Scanning" : "اوقف المسح" );
    });
</script>
<style>
    /*.result{*/
    /*    background-color: green;*/
    /*    color:#fff;*/
    /*    padding:20px;*/
    /*}*/
    /*.row{*/
    /*    display:flex;*/
    /*}*/
    @media (max-width: 530px) {
        #qr_driver_and_date{
            display: block !important;
        }
    }
</style>
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.Scan')</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a
                            class="text-muted text-hover-primary">@lang('web.Home')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">@lang('web.Scan_Management')</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <div id="qr_driver_and_date" style="display: flex">
                <select id="driver_id" name="driver_id" style="height: auto;line-height: 14px;width:170px;" class="form-select form-control-solid dd">
                    <option value="">choose driver</option>
                    @foreach($drivers as $driver)
                        <option  value="{{$driver->id}}">{{$driver->full_name}}</option>
                    @endforeach
                </select>
                <input style="height: 34px;width:170px;" class="form-select form-control-solid" type="date" name="delivery_date" id="delivery_date">
            </div>
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">@lang('web.Search by order number')</h3>
                </div>
                <div class="card-body">
                    <div class="row col-lg-4 col-md-5">
                        <label class="fs-6 fw-semibold form-label mb-2">@lang('web.order_number')</label>
                        <input class="form-control form-control-solid" style="padding: 1rem 1rem" placeholder="@lang('web.Enter Here')" id="order_number" name="order_number">
                        <button  class="btn btn-primary mt-2" onclick="send_order_number()">{{trans('web.Search')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">@lang('web.Scan')</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div style="width: 30%;" id="scanner">
                            <div style="width:300px; margin-top: 20px;" id="reader"></div>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // A $( document ).ready() block
        $( document ).ready(function() {
            document.getElementById('order_number').focus();
        });
    </script>

    <script type="text/javascript">

        var html5QrCode = new Html5QrcodeScanner(
            "reader", {fps: 100, qrbox: 250});
        html5QrCode.render(onScanSuccess, onScanError);
        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== null){
                document.getElementById('stop').click();
            }
            var driver = document.getElementById("driver_id").value;
            var delivery_date = document.getElementById("delivery_date").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('ScanQR.handleScan') }}",
                data: {
                    "scan":qrCodeMessage,
                    "driver_id":driver,
                    "delivery_date":delivery_date
                },
                success: function (data) {
                    if (data.success){
                        document.getElementById('stop').click();
                        Swal.fire(
                            '@lang('web.Status changed')',
                            '@lang('web.Order status changed successfully')',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else if(data.done){
                        document.getElementById('stop').click();
                        Swal.fire(
                            data.done,
                            '',
                            'info'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else if(data.unpaid){
                        document.getElementById('stop').click();
                        Swal.fire(
                            '@lang('web.Order unpaid yet!')',
                            '',
                            'info'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else{
                        document.getElementById('stop').click();
                        Swal.fire({
                            icon: 'error',
                            title: '@lang('web.error')',
                            text: '@lang('web.The order not found!')',
                            footer: ''
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }
                }
            });

        }

        function onScanError(errorMessage) {
            //handle scan error
        }

        function send_order_number(){
            var order_number = document.getElementById("order_number").value
            var driver = document.getElementById("driver_id").value;
            var delivery_date = document.getElementById("delivery_date").value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('ScanQR.handleScan') }}",
                data: {
                    "scan":order_number,
                    "driver_id":driver,
                    "delivery_date":delivery_date


                },
                success: function (data) {
                    if (data.success){
                        Swal.fire(
                            '@lang('web.Status changed')',
                            '@lang('web.Order status changed successfully')',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else if(data.done){
                        Swal.fire(
                            data.done,
                            '',
                            'info'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else if(data.unpaid){
                        Swal.fire(
                            '@lang('web.Order unpaid yet!')',
                            '',
                            'info'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: '@lang('web.error')',
                            text: '@lang('web.The order not found!')',
                            footer: ''
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('start').click();
                            }
                        })
                    }
                }
            });
        }

    </script>
@endsection
