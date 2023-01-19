<!DOCTYPE html>
<html @if(App::getLocale() == 'en') lang="en" style="direction: ltr;" @else lang="ar" style="direction: rtl;" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if IE]>
    <link rel="icon" href="/favicon.ico"><![endif]--><title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sen&amp;display=swap" rel="stylesheet">
    <link href="{{asset('pages/css/Customers.bef7e172.css')}}" rel="prefetch">
    <link href="{{asset('pages/css/chunk-0f057602.d60dae19.css')}}" rel="prefetch">
    <link href="{{asset('pages/css/chunk-321fc97b.4b40d0f4.css')}}" rel="prefetch">
    <link href="{{asset('pages/css/chunk-3fc50ebf.f5807d62.css')}}" rel="prefetch">
    <link href="{{asset('pages/css/chunk-cbf4d232.562737e0.css')}}" rel="prefetch">
    <link href="{{asset('pages/css/app.4930d402.css')}}" rel="preload" as="style">
    <link href="{{asset('pages/css/chunk-vendors.a704404d.css')}}" rel="preload" as="style">
    <link href="{{asset('pages/css/chunk-vendors.a704404d.css')}}" rel="stylesheet">
    <link href="{{asset('pages/css/app.4930d402.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
    <link rel="manifest" href="{{asset('pages/js/site/manifest.json')}}">
    <meta name="theme-color" content="#FF2165">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#FF5342">
    <meta name="apple-mobile-web-app-title" content="undefined">
    <link rel="apple-touch-icon" href="/img/icons/apple-touch-icon-152x152.png">
    <link rel="mask-icon" href="/img/icons/safari-pinned-tab.svg" color="#FF2165">
    <meta name="msapplication-TileImage" content="/img/icons/msapplication-icon-144x144.png">
    <meta name="msapplication-TileColor" content="#333333">
    <link rel="stylesheet" type="text/css" href="{{asset('pages/css/chunk-cbf4d232.562737e0.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('pages/css/chunk-321fc97b.4b40d0f4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('pages/css/Customers.bef7e172.css')}}">
    <style type="text/css" id="vuetify-theme-stylesheet">
        .v-application a {
            color: #01ace5;
        }
        .v-application .primary {
            background-color: #01ace5 !important;
            border-color: #01ace5 !important;
        }
        .v-application .primary--text {
            color: #01ace5 !important;
            caret-color: #01ace5 !important;
        }
        .v-application .primary.lighten-5 {
            background-color: #cbffff !important;
            border-color: #cbffff !important;
        }

        .v-application .primary--text.text--lighten-5 {
            color: #cbffff !important;
            caret-color: #cbffff !important;
        }

        .v-application .primary.lighten-4 {
            background-color: #acffff !important;
            border-color: #acffff !important;
        }

        .v-application .primary--text.text--lighten-4 {
            color: #acffff !important;
            caret-color: #acffff !important;
        }

        .v-application .primary.lighten-3 {
            background-color: #8cffff !important;
            border-color: #8cffff !important;
        }

        .v-application .primary--text.text--lighten-3 {
            color: #8cffff !important;
            caret-color: #8cffff !important;
        }

        .v-application .primary.lighten-2 {
            background-color: #6be3ff !important;
            border-color: #6be3ff !important;
        }

        .v-application .primary--text.text--lighten-2 {
            color: #6be3ff !important;
            caret-color: #6be3ff !important;
        }

        .v-application .primary.lighten-1 {
            background-color: #46c7ff !important;
            border-color: #46c7ff !important;
        }

        .v-application .primary--text.text--lighten-1 {
            color: #46c7ff !important;
            caret-color: #46c7ff !important;
        }

        .v-application .primary.darken-1 {
            background-color: #0091c9 !important;
            border-color: #0091c9 !important;
        }

        .v-application .primary--text.text--darken-1 {
            color: #0091c9 !important;
            caret-color: #0091c9 !important;
        }

        .v-application .primary.darken-2 {
            background-color: #0078ad !important;
            border-color: #0078ad !important;
        }

        .v-application .primary--text.text--darken-2 {
            color: #0078ad !important;
            caret-color: #0078ad !important;
        }

        .v-application .primary.darken-3 {
            background-color: #005f92 !important;
            border-color: #005f92 !important;
        }

        .v-application .primary--text.text--darken-3 {
            color: #005f92 !important;
            caret-color: #005f92 !important;
        }

        .v-application .primary.darken-4 {
            background-color: #004778 !important;
            border-color: #004778 !important;
        }

        .v-application .primary--text.text--darken-4 {
            color: #004778 !important;
            caret-color: #004778 !important;
        }

        .v-application .secondary {
            background-color: #444342 !important;
            border-color: #444342 !important;
        }

        .v-application .secondary--text {
            color: #444342 !important;
            caret-color: #444342 !important;
        }

        .v-application .secondary.lighten-5 {
            background-color: #c3c2c1 !important;
            border-color: #c3c2c1 !important;
        }

        .v-application .secondary--text.text--lighten-5 {
            color: #c3c2c1 !important;
            caret-color: #c3c2c1 !important;
        }

        .v-application .secondary.lighten-4 {
            background-color: #a8a7a6 !important;
            border-color: #a8a7a6 !important;
        }

        .v-application .secondary--text.text--lighten-4 {
            color: #a8a7a6 !important;
            caret-color: #a8a7a6 !important;
        }

        .v-application .secondary.lighten-3 {
            background-color: #8e8c8b !important;
            border-color: #8e8c8b !important;
        }

        .v-application .secondary--text.text--lighten-3 {
            color: #8e8c8b !important;
            caret-color: #8e8c8b !important;
        }

        .v-application .secondary.lighten-2 {
            background-color: #747372 !important;
            border-color: #747372 !important;
        }

        .v-application .secondary--text.text--lighten-2 {
            color: #747372 !important;
            caret-color: #747372 !important;
        }

        .v-application .secondary.lighten-1 {
            background-color: #5b5a59 !important;
            border-color: #5b5a59 !important;
        }

        .v-application .secondary--text.text--lighten-1 {
            color: #5b5a59 !important;
            caret-color: #5b5a59 !important;
        }

        .v-application .secondary.darken-1 {
            background-color: #2e2d2c !important;
            border-color: #2e2d2c !important;
        }

        .v-application .secondary--text.text--darken-1 {
            color: #2e2d2c !important;
            caret-color: #2e2d2c !important;
        }

        .v-application .secondary.darken-2 {
            background-color: #191817 !important;
            border-color: #191817 !important;
        }

        .v-application .secondary--text.text--darken-2 {
            color: #191817 !important;
            caret-color: #191817 !important;
        }

        .v-application .secondary.darken-3 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondary--text.text--darken-3 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .secondary.darken-4 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondary--text.text--darken-4 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .accent {
            background-color: #82b1ff !important;
            border-color: #82b1ff !important;
        }

        .v-application .accent--text {
            color: #82b1ff !important;
            caret-color: #82b1ff !important;
        }

        .v-application .accent.lighten-5 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .accent--text.text--lighten-5 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .accent.lighten-4 {
            background-color: #f8ffff !important;
            border-color: #f8ffff !important;
        }

        .v-application .accent--text.text--lighten-4 {
            color: #f8ffff !important;
            caret-color: #f8ffff !important;
        }

        .v-application .accent.lighten-3 {
            background-color: #daffff !important;
            border-color: #daffff !important;
        }

        .v-application .accent--text.text--lighten-3 {
            color: #daffff !important;
            caret-color: #daffff !important;
        }

        .v-application .accent.lighten-2 {
            background-color: #bce8ff !important;
            border-color: #bce8ff !important;
        }

        .v-application .accent--text.text--lighten-2 {
            color: #bce8ff !important;
            caret-color: #bce8ff !important;
        }

        .v-application .accent.lighten-1 {
            background-color: #9fccff !important;
            border-color: #9fccff !important;
        }

        .v-application .accent--text.text--lighten-1 {
            color: #9fccff !important;
            caret-color: #9fccff !important;
        }

        .v-application .accent.darken-1 {
            background-color: #6596e2 !important;
            border-color: #6596e2 !important;
        }

        .v-application .accent--text.text--darken-1 {
            color: #6596e2 !important;
            caret-color: #6596e2 !important;
        }

        .v-application .accent.darken-2 {
            background-color: #467dc6 !important;
            border-color: #467dc6 !important;
        }

        .v-application .accent--text.text--darken-2 {
            color: #467dc6 !important;
            caret-color: #467dc6 !important;
        }

        .v-application .accent.darken-3 {
            background-color: #2364aa !important;
            border-color: #2364aa !important;
        }

        .v-application .accent--text.text--darken-3 {
            color: #2364aa !important;
            caret-color: #2364aa !important;
        }

        .v-application .accent.darken-4 {
            background-color: #004c90 !important;
            border-color: #004c90 !important;
        }

        .v-application .accent--text.text--darken-4 {
            color: #004c90 !important;
            caret-color: #004c90 !important;
        }

        .v-application .error {
            background-color: #ff3459 !important;
            border-color: #ff3459 !important;
        }

        .v-application .error--text {
            color: #ff3459 !important;
            caret-color: #ff3459 !important;
        }

        .v-application .error.lighten-5 {
            background-color: #ffd0dc !important;
            border-color: #ffd0dc !important;
        }

        .v-application .error--text.text--lighten-5 {
            color: #ffd0dc !important;
            caret-color: #ffd0dc !important;
        }

        .v-application .error.lighten-4 {
            background-color: #ffb2c0 !important;
            border-color: #ffb2c0 !important;
        }

        .v-application .error--text.text--lighten-4 {
            color: #ffb2c0 !important;
            caret-color: #ffb2c0 !important;
        }

        .v-application .error.lighten-3 {
            background-color: #ff94a5 !important;
            border-color: #ff94a5 !important;
        }

        .v-application .error--text.text--lighten-3 {
            color: #ff94a5 !important;
            caret-color: #ff94a5 !important;
        }

        .v-application .error.lighten-2 {
            background-color: #ff768b !important;
            border-color: #ff768b !important;
        }

        .v-application .error--text.text--lighten-2 {
            color: #ff768b !important;
            caret-color: #ff768b !important;
        }

        .v-application .error.lighten-1 {
            background-color: #ff5771 !important;
            border-color: #ff5771 !important;
        }

        .v-application .error--text.text--lighten-1 {
            color: #ff5771 !important;
            caret-color: #ff5771 !important;
        }

        .v-application .error.darken-1 {
            background-color: #de0042 !important;
            border-color: #de0042 !important;
        }

        .v-application .error--text.text--darken-1 {
            color: #de0042 !important;
            caret-color: #de0042 !important;
        }

        .v-application .error.darken-2 {
            background-color: #be002c !important;
            border-color: #be002c !important;
        }

        .v-application .error--text.text--darken-2 {
            color: #be002c !important;
            caret-color: #be002c !important;
        }

        .v-application .error.darken-3 {
            background-color: #9e0018 !important;
            border-color: #9e0018 !important;
        }

        .v-application .error--text.text--darken-3 {
            color: #9e0018 !important;
            caret-color: #9e0018 !important;
        }

        .v-application .error.darken-4 {
            background-color: #7f0000 !important;
            border-color: #7f0000 !important;
        }

        .v-application .error--text.text--darken-4 {
            color: #7f0000 !important;
            caret-color: #7f0000 !important;
        }

        .v-application .info {
            background-color: #2196f3 !important;
            border-color: #2196f3 !important;
        }

        .v-application .info--text {
            color: #2196f3 !important;
            caret-color: #2196f3 !important;
        }

        .v-application .info.lighten-5 {
            background-color: #d4ffff !important;
            border-color: #d4ffff !important;
        }

        .v-application .info--text.text--lighten-5 {
            color: #d4ffff !important;
            caret-color: #d4ffff !important;
        }

        .v-application .info.lighten-4 {
            background-color: #b5ffff !important;
            border-color: #b5ffff !important;
        }

        .v-application .info--text.text--lighten-4 {
            color: #b5ffff !important;
            caret-color: #b5ffff !important;
        }

        .v-application .info.lighten-3 {
            background-color: #95e8ff !important;
            border-color: #95e8ff !important;
        }

        .v-application .info--text.text--lighten-3 {
            color: #95e8ff !important;
            caret-color: #95e8ff !important;
        }

        .v-application .info.lighten-2 {
            background-color: #75ccff !important;
            border-color: #75ccff !important;
        }

        .v-application .info--text.text--lighten-2 {
            color: #75ccff !important;
            caret-color: #75ccff !important;
        }

        .v-application .info.lighten-1 {
            background-color: #51b0ff !important;
            border-color: #51b0ff !important;
        }

        .v-application .info--text.text--lighten-1 {
            color: #51b0ff !important;
            caret-color: #51b0ff !important;
        }

        .v-application .info.darken-1 {
            background-color: #007cd6 !important;
            border-color: #007cd6 !important;
        }

        .v-application .info--text.text--darken-1 {
            color: #007cd6 !important;
            caret-color: #007cd6 !important;
        }

        .v-application .info.darken-2 {
            background-color: #0064ba !important;
            border-color: #0064ba !important;
        }

        .v-application .info--text.text--darken-2 {
            color: #0064ba !important;
            caret-color: #0064ba !important;
        }

        .v-application .info.darken-3 {
            background-color: #004d9f !important;
            border-color: #004d9f !important;
        }

        .v-application .info--text.text--darken-3 {
            color: #004d9f !important;
            caret-color: #004d9f !important;
        }

        .v-application .info.darken-4 {
            background-color: #003784 !important;
            border-color: #003784 !important;
        }

        .v-application .info--text.text--darken-4 {
            color: #003784 !important;
            caret-color: #003784 !important;
        }

        .v-application .success {
            background-color: #00e24d !important;
            border-color: #00e24d !important;
        }

        .v-application .success--text {
            color: #00e24d !important;
            caret-color: #00e24d !important;
        }

        .v-application .success.lighten-5 {
            background-color: #cfffd9 !important;
            border-color: #cfffd9 !important;
        }

        .v-application .success--text.text--lighten-5 {
            color: #cfffd9 !important;
            caret-color: #cfffd9 !important;
        }

        .v-application .success.lighten-4 {
            background-color: #afffbc !important;
            border-color: #afffbc !important;
        }

        .v-application .success--text.text--lighten-4 {
            color: #afffbc !important;
            caret-color: #afffbc !important;
        }

        .v-application .success.lighten-3 {
            background-color: #8fffa0 !important;
            border-color: #8fffa0 !important;
        }

        .v-application .success--text.text--lighten-3 {
            color: #8fffa0 !important;
            caret-color: #8fffa0 !important;
        }

        .v-application .success.lighten-2 {
            background-color: #6dff84 !important;
            border-color: #6dff84 !important;
        }

        .v-application .success--text.text--lighten-2 {
            color: #6dff84 !important;
            caret-color: #6dff84 !important;
        }

        .v-application .success.lighten-1 {
            background-color: #47ff68 !important;
            border-color: #47ff68 !important;
        }

        .v-application .success--text.text--lighten-1 {
            color: #47ff68 !important;
            caret-color: #47ff68 !important;
        }

        .v-application .success.darken-1 {
            background-color: #00c531 !important;
            border-color: #00c531 !important;
        }

        .v-application .success--text.text--darken-1 {
            color: #00c531 !important;
            caret-color: #00c531 !important;
        }

        .v-application .success.darken-2 {
            background-color: #00a90c !important;
            border-color: #00a90c !important;
        }

        .v-application .success--text.text--darken-2 {
            color: #00a90c !important;
            caret-color: #00a90c !important;
        }

        .v-application .success.darken-3 {
            background-color: #008d00 !important;
            border-color: #008d00 !important;
        }

        .v-application .success--text.text--darken-3 {
            color: #008d00 !important;
            caret-color: #008d00 !important;
        }

        .v-application .success.darken-4 {
            background-color: #007200 !important;
            border-color: #007200 !important;
        }

        .v-application .success--text.text--darken-4 {
            color: #007200 !important;
            caret-color: #007200 !important;
        }

        .v-application .warning {
            background-color: #fb8c00 !important;
            border-color: #fb8c00 !important;
        }

        .v-application .warning--text {
            color: #fb8c00 !important;
            caret-color: #fb8c00 !important;
        }

        .v-application .warning.lighten-5 {
            background-color: #ffff9e !important;
            border-color: #ffff9e !important;
        }

        .v-application .warning--text.text--lighten-5 {
            color: #ffff9e !important;
            caret-color: #ffff9e !important;
        }

        .v-application .warning.lighten-4 {
            background-color: #fffb82 !important;
            border-color: #fffb82 !important;
        }

        .v-application .warning--text.text--lighten-4 {
            color: #fffb82 !important;
            caret-color: #fffb82 !important;
        }

        .v-application .warning.lighten-3 {
            background-color: #ffdf67 !important;
            border-color: #ffdf67 !important;
        }

        .v-application .warning--text.text--lighten-3 {
            color: #ffdf67 !important;
            caret-color: #ffdf67 !important;
        }

        .v-application .warning.lighten-2 {
            background-color: #ffc24b !important;
            border-color: #ffc24b !important;
        }

        .v-application .warning--text.text--lighten-2 {
            color: #ffc24b !important;
            caret-color: #ffc24b !important;
        }

        .v-application .warning.lighten-1 {
            background-color: #ffa72d !important;
            border-color: #ffa72d !important;
        }

        .v-application .warning--text.text--lighten-1 {
            color: #ffa72d !important;
            caret-color: #ffa72d !important;
        }

        .v-application .warning.darken-1 {
            background-color: #db7200 !important;
            border-color: #db7200 !important;
        }

        .v-application .warning--text.text--darken-1 {
            color: #db7200 !important;
            caret-color: #db7200 !important;
        }

        .v-application .warning.darken-2 {
            background-color: #bb5900 !important;
            border-color: #bb5900 !important;
        }

        .v-application .warning--text.text--darken-2 {
            color: #bb5900 !important;
            caret-color: #bb5900 !important;
        }

        .v-application .warning.darken-3 {
            background-color: #9d4000 !important;
            border-color: #9d4000 !important;
        }

        .v-application .warning--text.text--darken-3 {
            color: #9d4000 !important;
            caret-color: #9d4000 !important;
        }

        .v-application .warning.darken-4 {
            background-color: #802700 !important;
            border-color: #802700 !important;
        }

        .v-application .warning--text.text--darken-4 {
            color: #802700 !important;
            caret-color: #802700 !important;
        }

        .v-application .primaryVarient {
            background-color: #008b9e !important;
            border-color: #008b9e !important;
        }

        .v-application .primaryVarient--text {
            color: #008b9e !important;
            caret-color: #008b9e !important;
        }

        .v-application .primaryVarient.lighten-5 {
            background-color: #b3ffff !important;
            border-color: #b3ffff !important;
        }

        .v-application .primaryVarient--text.text--lighten-5 {
            color: #b3ffff !important;
            caret-color: #b3ffff !important;
        }

        .v-application .primaryVarient.lighten-4 {
            background-color: #95f9ff !important;
            border-color: #95f9ff !important;
        }

        .v-application .primaryVarient--text.text--lighten-4 {
            color: #95f9ff !important;
            caret-color: #95f9ff !important;
        }

        .v-application .primaryVarient.lighten-3 {
            background-color: #78ddf1 !important;
            border-color: #78ddf1 !important;
        }

        .v-application .primaryVarient--text.text--lighten-3 {
            color: #78ddf1 !important;
            caret-color: #78ddf1 !important;
        }

        .v-application .primaryVarient.lighten-2 {
            background-color: #59c1d5 !important;
            border-color: #59c1d5 !important;
        }

        .v-application .primaryVarient--text.text--lighten-2 {
            color: #59c1d5 !important;
            caret-color: #59c1d5 !important;
        }

        .v-application .primaryVarient.lighten-1 {
            background-color: #38a6b9 !important;
            border-color: #38a6b9 !important;
        }

        .v-application .primaryVarient--text.text--lighten-1 {
            color: #38a6b9 !important;
            caret-color: #38a6b9 !important;
        }

        .v-application .primaryVarient.darken-1 {
            background-color: #007184 !important;
            border-color: #007184 !important;
        }

        .v-application .primaryVarient--text.text--darken-1 {
            color: #007184 !important;
            caret-color: #007184 !important;
        }

        .v-application .primaryVarient.darken-2 {
            background-color: #00596b !important;
            border-color: #00596b !important;
        }

        .v-application .primaryVarient--text.text--darken-2 {
            color: #00596b !important;
            caret-color: #00596b !important;
        }

        .v-application .primaryVarient.darken-3 {
            background-color: #004152 !important;
            border-color: #004152 !important;
        }

        .v-application .primaryVarient--text.text--darken-3 {
            color: #004152 !important;
            caret-color: #004152 !important;
        }

        .v-application .primaryVarient.darken-4 {
            background-color: #002a3b !important;
            border-color: #002a3b !important;
        }

        .v-application .primaryVarient--text.text--darken-4 {
            color: #002a3b !important;
            caret-color: #002a3b !important;
        }

        .v-application .secondaryVarient {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondaryVarient--text {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .secondaryVarient.lighten-5 {
            background-color: #777777 !important;
            border-color: #777777 !important;
        }

        .v-application .secondaryVarient--text.text--lighten-5 {
            color: #777777 !important;
            caret-color: #777777 !important;
        }

        .v-application .secondaryVarient.lighten-4 {
            background-color: #5e5e5e !important;
            border-color: #5e5e5e !important;
        }

        .v-application .secondaryVarient--text.text--lighten-4 {
            color: #5e5e5e !important;
            caret-color: #5e5e5e !important;
        }

        .v-application .secondaryVarient.lighten-3 {
            background-color: #474747 !important;
            border-color: #474747 !important;
        }

        .v-application .secondaryVarient--text.text--lighten-3 {
            color: #474747 !important;
            caret-color: #474747 !important;
        }

        .v-application .secondaryVarient.lighten-2 {
            background-color: #303030 !important;
            border-color: #303030 !important;
        }

        .v-application .secondaryVarient--text.text--lighten-2 {
            color: #303030 !important;
            caret-color: #303030 !important;
        }

        .v-application .secondaryVarient.lighten-1 {
            background-color: #1b1b1b !important;
            border-color: #1b1b1b !important;
        }

        .v-application .secondaryVarient--text.text--lighten-1 {
            color: #1b1b1b !important;
            caret-color: #1b1b1b !important;
        }

        .v-application .secondaryVarient.darken-1 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondaryVarient--text.text--darken-1 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .secondaryVarient.darken-2 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondaryVarient--text.text--darken-2 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .secondaryVarient.darken-3 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondaryVarient--text.text--darken-3 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .secondaryVarient.darken-4 {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }

        .v-application .secondaryVarient--text.text--darken-4 {
            color: #000000 !important;
            caret-color: #000000 !important;
        }

        .v-application .background {
            background-color: #f6f6f6 !important;
            border-color: #f6f6f6 !important;
        }

        .v-application .background--text {
            color: #f6f6f6 !important;
            caret-color: #f6f6f6 !important;
        }

        .v-application .background.lighten-5 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .background--text.text--lighten-5 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .background.lighten-4 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .background--text.text--lighten-4 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .background.lighten-3 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .background--text.text--lighten-3 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .background.lighten-2 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .background--text.text--lighten-2 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .background.lighten-1 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .background--text.text--lighten-1 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .background.darken-1 {
            background-color: #dadada !important;
            border-color: #dadada !important;
        }

        .v-application .background--text.text--darken-1 {
            color: #dadada !important;
            caret-color: #dadada !important;
        }

        .v-application .background.darken-2 {
            background-color: #bebebe !important;
            border-color: #bebebe !important;
        }

        .v-application .background--text.text--darken-2 {
            color: #bebebe !important;
            caret-color: #bebebe !important;
        }

        .v-application .background.darken-3 {
            background-color: #a3a3a3 !important;
            border-color: #a3a3a3 !important;
        }

        .v-application .background--text.text--darken-3 {
            color: #a3a3a3 !important;
            caret-color: #a3a3a3 !important;
        }

        .v-application .background.darken-4 {
            background-color: #888888 !important;
            border-color: #888888 !important;
        }

        .v-application .background--text.text--darken-4 {
            color: #888888 !important;
            caret-color: #888888 !important;
        }

        .v-application .surface {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.lighten-5 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text.text--lighten-5 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.lighten-4 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text.text--lighten-4 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.lighten-3 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text.text--lighten-3 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.lighten-2 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text.text--lighten-2 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.lighten-1 {
            background-color: #ffffff !important;
            border-color: #ffffff !important;
        }

        .v-application .surface--text.text--lighten-1 {
            color: #ffffff !important;
            caret-color: #ffffff !important;
        }

        .v-application .surface.darken-1 {
            background-color: #e2e2e2 !important;
            border-color: #e2e2e2 !important;
        }

        .v-application .surface--text.text--darken-1 {
            color: #e2e2e2 !important;
            caret-color: #e2e2e2 !important;
        }

        .v-application .surface.darken-2 {
            background-color: #c6c6c6 !important;
            border-color: #c6c6c6 !important;
        }

        .v-application .surface--text.text--darken-2 {
            color: #c6c6c6 !important;
            caret-color: #c6c6c6 !important;
        }

        .v-application .surface.darken-3 {
            background-color: #ababab !important;
            border-color: #ababab !important;
        }

        .v-application .surface--text.text--darken-3 {
            color: #ababab !important;
            caret-color: #ababab !important;
        }

        .v-application .surface.darken-4 {
            background-color: #919191 !important;
            border-color: #919191 !important;
        }

        .v-application .surface--text.text--darken-4 {
            color: #919191 !important;
            caret-color: #919191 !important;
        }</style>
    <link rel="stylesheet" type="text/css" href="{{asset('pages/css/chunk-0f057602.d60dae19.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('pages/css/chunk-3fc50ebf.f5807d62.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
<div data-v-d2325c8a="" data-app="true" class="v-application v-application--is-rtl theme--light" id="app">
    <div class="v-application--wrap">
        <div data-v-d2325c8a="">
            <nav>
                <header class="v-sheet theme--light elevation-5 v-toolbar v-app-bar white" data-booted="true"
                        style="height: 100px; margin-top: 0px; transform: translateY(0px); left: 0px; right: 0px;">
                    <div class="v-toolbar__content" style="height: 100px;">
                        <div class="container pa-0 container--fluid">
                            <div class="d-flex justify-space-between">
                                <div aria-label="" class="v-image v-responsive shrink theme--light"
                                     style="width: 100px;">
                                    <div class="v-responsive__sizer" style="padding-bottom: 97.2163%;"></div>
                                    <div class="v-image__image v-image__image--contain"
                                         style="background-image: url(&quot;https://ezhlha.makegrp.com/img/Image%20from%20iOS.8ceff8a0.jpg&quot;); background-position: center center;"></div>
                                    <div class="v-responsive__content" style="width: 467px;"></div>
                                </div>
                                <div aria-label="" class="v-image v-responsive shrink me-5 ms-10 theme--light"
                                     style="width: 65px;">
                                    <div class="v-responsive__sizer" style="padding-bottom: 151.974%;"></div>
                                    <div class="v-image__image v-image__image--contain"
                                         style="background-image: url(&quot;https://ezhlha.makegrp.com/img/Ezhelha_Logo.91c810f7.png&quot;); background-position: center center;"></div>
                                    <div class="v-responsive__content" style="width: 608px;"></div>
                                </div>
                                <div class="text-center py-5">
                                    <button type="button"
                                            class="black--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default"
                                            role="button" aria-haspopup="true" aria-expanded="false"
                                            style="background-color: rgba(177, 232, 235, 0.37); border-color: rgba(177, 232, 235, 0.37);">
                                        <span class="v-btn__content"><i aria-hidden="true"
                                                                        class="v-icon notranslate v-icon--left mdi mdi-web theme--light"></i> عربى </span>
                                    </button>
                                    <div class="v-menu" style="z-index: 999;"><!----></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </nav>
        </div>
        <main data-v-d2325c8a="" class="v-main bg" data-booted="true" style="padding: 0px;">
            <div class="v-main__wrap">
                <div data-v-71b52688="" data-v-d2325c8a="">
                    <div data-v-71b52688="" class="container px-8 pt-6 pt-6 pb-8">
                        <span data-v-71b52688="">
                             <!-- Success message -->
                             @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('failed'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('failed')}}
                                </div>
                            @endif
                            <form action="{{route('new-request.store')}}" method="post">
                                @csrf
                                <div data-v-71b52688="" class="row">
                                    <div  class="col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <h2 class="text-center">طلب جديد</h2>
                                    </div>
                                    <div data-v-71b52688="" class="py-0 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <div data-v-71b52688="" class="d-flex flex-row justify-center">
                                            <div data-v-71b52688="" aria-label="" class="v-image v-responsive bg theme--light" style="width: 650px;">
                                                <div class="v-responsive__sizer" style="padding-bottom: 97.2163%;"></div>
                                                <div class="v-image__image v-image__image--contain" style="background-image: url({{asset('images/Imagebackground.jpg')}}); background-position: center center;"></div>
                                                <div class="v-responsive__content" style="width: 467px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty v-input--is-readonly theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-text-field__slot">
                                                            <label for="input-15" class="v-label v-label--active theme--light" style="left: auto; right: 0px; position: absolute;">رقم الطلب</label>
                                                            <input id="input-15" name="order_number" value="{{$order_number}}" readonly="readonly" type="text"></div></div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div></div></div></div></div></span></div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-input__prepend-inner"><div
                                                                class="v-input__icon v-input__icon--prepend-inner"><i
                                                                    aria-hidden="true"
                                                                    class="v-icon notranslate mdi mdi-account-circle-outline theme--light"></i></div></div><div
                                                            class="v-text-field__slot"><label for="input-19"
                                                                                              class="v-label v-label--active theme--light"
                                                                                              style="left: auto; right: 0px; position: absolute;">الأسم</label>
                                                            <input id="input-19" type="text" name="name" value="{{$name}}"></div></div><div
                                                        class="v-text-field__details"><div
                                                            class="v-messages theme--light"><div
                                                                class="v-messages__wrapper"></div></div></div></div></div></span></div><div
                                        data-v-71b52688=""
                                        class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688=""><div data-v-71b52688=""
                                                                    class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-input__prepend-inner"><div
                                                                class="v-input__icon v-input__icon--prepend-inner"><i
                                                                    aria-hidden="true"
                                                                    class="v-icon notranslate mdi mdi-phone-outline theme--light"></i></div></div><div
                                                            class="v-text-field__slot"><label for="input-24"
                                                                                              class="v-label v-label--active theme--light"
                                                                                              style="left: auto; right: 0px; position: absolute;">رقم الهاتف</label>
                                                            <input id="input-24" type="number" name="phone" value="{{$phone}}"></div></div><div
                                                        class="v-text-field__details"><div
                                                            class="v-messages theme--light"><div
                                                                class="v-messages__wrapper"></div></div></div></div></div></span></div><div
                                        data-v-71b52688=""
                                        class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688=""><div data-v-71b52688=""
                                                                    class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-input__prepend-inner"><div
                                                                class="v-input__icon v-input__icon--prepend-inner"><i
                                                                    aria-hidden="true"
                                                                    class="v-icon notranslate mdi mdi-email-open-outline theme--light"></i></div></div><div
                                                            class="v-text-field__slot"><label for="input-29"
                                                                                              class="v-label v-label--active theme--light"
                                                                                              style="left: auto; right: 0px; position: absolute;">البريد الإلكتروني</label>
                                                            <input id="input-29" type="email" name="email" value="{{$email}}"></div></div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div></div></div></div></div></span></div>
                                    <div data-v-71b52688="" class="py-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12" style="z-index: 900;">
                                        <h3 class="primary--text text-center">العنوان</h3>
                                    </div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <span data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded v-select v-autocomplete" style="z-index: 999;">
                                                <div class="v-input__control">
                                                    <div role="combobox" aria-haspopup="listbox" aria-expanded="false"
                                                         aria-owns="list-34" class="v-input__slot">
                                                        <div class="v-select__slot">
                                                           {{-- <label for="input-34" class="v-label theme--light" style="left: auto; right: 0px; position: absolute;">محافظة</label>--}}
                                                            <select name="governorate" style="width: 100%; height: 100%; outline: none;max-height: 304px; min-width: 91%; top: 455px; left: 672px; transform-origin: left top; z-index: 1001;">
                                                            <option>المحافظة</option>
                                                             @foreach(getGovernorate() as $value)
                                                                    <option value="{{$value->id}}">{{$value->name_en}}</option>
                                                             @endforeach
                                                        </select>
                                                             <div class="v-input__append-inner">
                                                                <div class="v-input__icon v-input__icon--append">
                                                                    <i aria-hidden="true" class="v-icon notranslate mdi mdi-menu-down theme--light"></i>
                                                                </div>
                                                            </div>
                                                            <input type="hidden">

                                                        </div>
                                                       {{-- <div class="v-menu"><!----></div>--}}

                                                    </div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <span data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded v-select v-autocomplete" style="z-index: 999;">
                                                <div class="v-input__control">
                                                    <div role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-owns="list-40" class="v-input__slot">
                                                        <div class="v-select__slot">
                                                            {{--<label for="input-40" class="v-label theme--light" style="left: auto; right: 0px; position: absolute;">مدينة</label>
                                                            <input id="input-40" type="text" autocomplete="off" value="{{$city}}">--}}
                                                             <select name="city" style="width: 100%; height: 100%; outline: none;max-height: 304px; min-width: 91%; top: 455px; left: 672px; transform-origin: left top; z-index: 1001;">
                                                            <option>المدينة</option>
                                                             @foreach(getCite() as $value)
                                                                     <option value="{{$value->id}}">{{$value->name_en}}</option>
                                                             @endforeach
                                                        </select>
                                                            <div class="v-input__append-inner">
                                                                <div class="v-input__icon v-input__icon--append">
                                                                    <i aria-hidden="true" class="v-icon notranslate mdi mdi-menu-down theme--light"></i></div></div>
                                                            <input type="hidden"></div><div
                                                            class="v-menu"><!----></div></div><div
                                                        class="v-text-field__details"><div
                                                            class="v-messages theme--light"><div
                                                                class="v-messages__wrapper"></div></div></div></div></div></span></div><div
                                        data-v-71b52688=""
                                        class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688=""><div data-v-71b52688=""
                                                                    class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-text-field__slot"><label for="input-46"
                                                                                              class="v-label v-label--active theme--light"
                                                                                              style="left: auto; right: 0px; position: absolute;">قطعة</label>
                                                            <input id="input-46" type="text" name="block" value="{{$block}}">
                                                        </div>
                                                    </div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div></div></div></div></div></span></div><div
                                        data-v-71b52688=""
                                        class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688=""><div data-v-71b52688=""
                                                                    class="v-input rounded-lg overLap theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-text-field__slot">
                                                            <label for="input-50" class="v-label theme--light" style="left: auto; right: 0px; position: absolute;">جادة</label>
                                                            <input id="input-50" type="text" name="jadda" value="{{$jadda}}"></div></div><div
                                                        class="v-text-field__details"><div
                                                            class="v-messages theme--light"><div
                                                                class="v-messages__wrapper"></div></div></div></div></div></span></div><div
                                        data-v-71b52688=""
                                        class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><span
                                            data-v-71b52688=""><div data-v-71b52688=""
                                                                    class="v-input rounded-lg overLap v-input--is-label-active v-input--is-dirty theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded"><div
                                                    class="v-input__control"><div class="v-input__slot"><div
                                                            class="v-text-field__slot"><label for="input-54"
                                                                                              class="v-label v-label--active theme--light"
                                                                                              style="left: auto; right: 0px; position: absolute;">شارع</label>
                                                            <input id="input-54" type="text" name="street" value="{{$street}}">
                                                        </div>
                                                    </div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <span data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded">
                                                <div class="v-input__control">
                                                    <div class="v-input__slot">
                                                        <div class="v-text-field__slot">
                                                            <label for="input-58" class="v-label theme--light" style="left: auto; right: 0px; position: absolute;">رقم المبنى</label>
                                                            <input id="input-58" type="text" name="house" value="{{$house}}">
                                                        </div>
                                                    </div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div data-v-71b52688="" class="pb-4 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <span data-v-71b52688="">
                                            <div data-v-71b52688="" class="v-input rounded-lg overLap theme--light v-text-field v-text-field--filled v-text-field--is-booted v-text-field--enclosed v-text-field--rounded">
                                                <div class="v-input__control"><div class="v-input__slot">
                                                        <div class="v-text-field__slot">
                                                            <label for="input-62" class="v-label theme--light" style="left: auto; right: 0px; position: absolute;">الطابق</label>
                                                            <input id="input-62" type="text" name="floor" value="floor">
                                                        </div>
                                                    </div>
                                                    <div class="v-text-field__details">
                                                        <div class="v-messages theme--light">
                                                            <div class="v-messages__wrapper"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div data-v-71b52688="" class="py-0 text-center col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12"><!----></div>
                                    <div data-v-71b52688="" class="mt-3 col-sm-6 col-md-4 offset-sm-3 offset-md-4 col-12">
                                        <button data-v-71b52688="" type="submit" class="v-btn v-btn--block v-btn--has-bg theme--light v-size--x-large primary">
                                            <span class="v-btn__content">دفع رسوم التوصيل</span>
                                        </button>
                                    </div></div>
                            </form></span></div>

                </div>
            </div>
        </main>
    </div>

    {{--
        <div class="v-menu__content theme--light menuable__content__active v-autocomplete__content" style="max-height: 304px; min-width: 558px; top: 637px; left: 673px; transform-origin: left top; z-index: 1001;">
            <div role="listbox" tabindex="-1" class="v-list v-select-list v-sheet theme--light theme--light" data-v-71b52688="true" id="list-34">
                <div tabindex="0" aria-selected="false" id="list-item-84-0" role="option" class="v-list-item v-list-item--link theme--light">
                    <div class="v-list-item__content">
                        <div class="v-list-item__title">Hawalli Governorate</div>
                    </div>
                </div>
                <div tabindex="0" aria-selected="false" id="list-item-84-1" role="option" class="v-list-item v-list-item--link theme--light">
                    <div class="v-list-item__content"><div class="v-list-item__title">Ahmadi Governorate
                        </div>
                    </div>
                </div>
                <div tabindex="0" aria-selected="false" id="list-item-84-2" role="option" class="v-list-item v-list-item--link theme--light">
                    <div class="v-list-item__content">
                        <div class="v-list-item__title">Farwaniya Governorate</div>
                    </div>
                </div>
                <div tabindex="0" aria-selected="false" id="list-item-84-3" role="option" class="v-list-item v-list-item--link theme--light">
                    <div class="v-list-item__content"><div class="v-list-item__title">Jahra Governorate</div></div></div><div tabindex="0" aria-selected="false" id="list-item-84-4" role="option" class="v-list-item v-list-item--link theme--light"><div class="v-list-item__content"><div class="v-list-item__title">Capital Governorate</div></div></div><div tabindex="0" aria-selected="false" id="list-item-84-5" role="option" class="v-list-item v-list-item--link theme--light"><div class="v-list-item__content"><div class="v-list-item__title">Mubarak Alkabeer</div></div></div></div></div>
    --}}

</div>
</body>
</html>
