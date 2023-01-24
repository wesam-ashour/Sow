<table>
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
    @foreach ($orders as $p)
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
