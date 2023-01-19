@extends('layouts.master')
@section('css')
@endsection
<meta name="apple-mobile-web-app-capable" content="yes">
<script src="{{asset('assets/js/html5-qrcode.min.js')}}"></script>
<style>
    /*.result{*/
    /*    background-color: green;*/
    /*    color:#fff;*/
    /*    padding:20px;*/
    /*}*/
    /*.row{*/
    /*    display:flex;*/
    /*}*/
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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('web.driver_list')</h1>
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
                    <li class="breadcrumb-item text-muted">@lang('web.drivers_Management')</li>
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
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-bordered">
                <div class="card-header">
                    <h3 class="card-title">Scan Qrcode</h3>
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

    <script type="text/javascript">
        var html5QrCode = new Html5QrcodeScanner(
            "reader", {fps: 100, qrbox: 250});
        html5QrCode.render(onScanSuccess, onScanError);
        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== null){
                document.getElementById('stop').click();
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('ScanQR.handleScan') }}",
                data: {"scan":qrCodeMessage},
                success: function (data) {
                    if (data.success){
                        document.getElementById('stop').click();
                        Swal.fire(
                            'Status changed',
                            data.success,
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
                    }else{
                        document.getElementById('stop').click();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.error,
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

    </script>
@endsection
