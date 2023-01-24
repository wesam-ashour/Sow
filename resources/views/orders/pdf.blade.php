<!DOCTYPE html>
<html @if(App::getLocale() == 'en') lang="en" dir="ltr" @else lang="ar" dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('event.register') }}</title>
    <style>
        body {
            font-family: arial, sans-serif;
            letter-spacing: -0.3px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
            padding: 4px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<strong>{{ __('web.Orders') }}<span> ({{count($pd)}})</span></strong>
<br>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('web.order_number') }}</th>
        <th scope="col">{{ __('web.name') }}</th>
        <th scope="col">{{ __('web.email') }}</th>
        <th scope="col">{{ __('web.status') }}</th>
        <th scope="col">{{ __('web.driver') }}</th>
        <th scope="col">{{ __('web.delivery_date') }}</th>
        <th scope="col">{{ __('web.payment_status') }}</th>

    </tr>
    </thead>
    <tbody>

    @foreach ($pd as $p)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$p->order_number}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->email}}</td>
            <td>
                {{Select($p->status)}}
            </td>
            <td>
                @if($p->user_id)
                    {{\App\Models\User::find($p->user_id)->full_name}}
                @else
                    @lang('web.No Driver yet')
                @endif
            </td>
            <td>
                @if($p->delivery_date)
                    {{$p->delivery_date}}
                @else
                    @lang('web.Not delivered yet')
                @endif
            </td>
            <td>
                @if($p->payment_status)
                    {{payment_status($p->payment_status)}}
                @else
                    @lang('web.Not payments yet')

                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>


