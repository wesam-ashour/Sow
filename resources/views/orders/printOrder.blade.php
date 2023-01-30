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
<br>
<br>
<table class="table">
    <thead>
    <tr>

    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Order number/رقم الطلب</th>
        <td>{{$pd->order_number}}</td>
    </tr>
    <tr>
        <th scope="row">Name/الأسم</th>
        <td>{{$pd->name}}</td>
    </tr>
    <tr>
        <th scope="row">Phone Number/رقم الهاتف</th>
        <td>{{$pd->phone}}</td>
    </tr>
    <tr>
        <th scope="row">E-mail/البريد الإلكتروني</th>
        <td>{{$pd->email}}</td>
    </tr>
    <tr>
        <th scope="row">Governorate/المحافظة</th>
        <td>{{getGovernorateByid($pd->governorate)}}</td>
    </tr>
    <tr>
        <th scope="row">City/المدينة</th>
        <td>{{getCiteByid($pd->city)->name}}</td>
    </tr>
    <tr>
        <th scope="row">block/قطعة</th>
        <td>{{$pd->block}}</td>
    </tr>
    <tr>
        <th scope="row">jadda/جادة</th>
        <td>{{$pd->jadda}}</td>
    </tr>
    <tr>
        <th scope="row">street/شارع</th>
        <td>{{$pd->street}}</td>
    </tr>
    <tr>
        <th scope="row">house/المنزل</th>
        <td>{{$pd->house}}</td>
    </tr>
    <tr>
        <th scope="row">floor/الطابق</th>
        <td>{{$pd->floor}}</td>
    </tr>
    <tr>
        <th scope="row">driver's name/اسم السائق</th>
        <td>{{getUserName($pd->user_id)}}</td>
    </tr>
    <tr>
        <th scope="row">delivery date/تاريخ التوصيل</th>
        <td>{{$pd->delivery_date}}</td>
    </tr>
    </tbody>
</table>
</body>

</html>


