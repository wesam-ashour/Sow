<?php

namespace App\Http\Controllers;

use App\Exports\OrdersBetweenExport;
use App\Exports\OrdersExport;
use App\Models\Lookups;
use App\Models\Order;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Yajra\DataTables\Facades\DataTables;
use function Symfony\Component\Translation\t;

class TransportationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:orders_view']);
    }

    public function index(Request $request)
    {
        $transportations_all = Order::query()->latest();
        $cities = Lookups::query()->whereNotNull('fk_relationships')->get();
        $drivers = User::query()->where('user_type', '=', 1)->get()->all();
        if ($request->ajax()) {
            return Datatables::of($transportations_all)->addIndexColumn()
                ->addColumn('order_number', function ($transportations_all) {
                    return $transportations_all->order_number;
                })
                ->addColumn('name', function ($transportations_all) {
                    return $transportations_all->name;
                })
                ->addColumn('email', function ($transportations_all) {
                    return $transportations_all->email;
                })
                ->addColumn('city', function ($transportations_all) {
                    $data = getCiteByid($transportations_all->city);
                    if ($data)
                        return $data->name;
                    else
                        return '---';
                })
                ->addColumn('status', function ($transportations_all) {
                    $select = '<select style="height: auto;line-height: 14px;width:170px;" class="form-select form-control-solid cc" id="' . $transportations_all->id . '" ' . disableSelect($transportations_all->status) . ' onchange="ChangeSelect(this)">';
                    foreach (Order::STATUS as $status) {
                        $select = $select . '<option ' . disableOption($status) . ' value="' . $status . '" ' . selected($status, $transportations_all->status) . '>' . Select($status) . '</option>';
                    }
                    return $select . '</select>';
                })
                ->addColumn('assign_driver', function ($transportations_all) {
                    $select = '<select style="height: auto;line-height: 14px;width:170px;" class="form-select form-control-solid dd" id="' . $transportations_all->id . '" ' . disableSelectDriver($transportations_all->status) . ' onchange="ChangeSelectUser(this)"><option></option>';
                    foreach (User::where('user_type', 1)->get() as $user) {
                        $select = $select . '<option value="' . $user->id . '" ' . selectedUser($user->id, $transportations_all->user_id) . '>' . $user->full_name . '</option>';
                    }
                    return $select . '</select>';
                })
                ->addColumn('delivery_date', function ($transportations_all) {
                    return '<input style="height: 34px;width:170px;" class="form-select form-control-solid dd" value="' . $transportations_all->delivery_date . '" type="date" id="' . $transportations_all->id . '" onchange="delivery_date(this)" ' . disableSelectDriver($transportations_all->status) . '></option>';
                })
                ->addColumn('payment_status', function ($transportations_all) {
                    return payment_status($transportations_all->payment_status);
                })
                ->editColumn('actions', function ($transportations_all) {
                    $action = '<button id="show" data-id="' . $transportations_all->id . '" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_show_orders">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
                                                                    </svg>
																</span>
                                    <!--end::Svg Icon-->
                                </button>';
                    return $action;
                })
                ->rawColumns(['order_number'], ['name'], ['email'],
                    ['governorate'], ['city'], ['pieces_number'], ['avenue'], ['street'], ['building_number'], ['floor'], ['status'], ['payment_status'])
                ->escapeColumns(['order_number' => 'order_number'], ['name' => 'name'], ['phone_number' => 'phone_number']
                    , ['email' => 'email'], ['governorate' => 'governorate'], ['city' => 'city']
                    , ['pieces_number' => 'pieces_number'], ['avenue' => 'avenue'], ['street' => 'street'], ['building_number' => 'building_number']
                    , ['floor' => 'floor'], ['status' => 'status'], ['payment_status' => 'payment_status'])
                ->make(true);
        }
        return view('orders.index', compact('cities', 'drivers'));
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->search) {
                $values = [];
                $transportations_all = [];
                $data = DB::table('users')->where('full_name', 'LIKE', '%' . $request->search . "%")->get();
                if (array($data)) {
                    foreach ($data as $product) {
                        $values[] = $product->id;
                    }
                }
                foreach ($values as $value) {
                    $transportations_Values = DB::table('transportation_requests')->where('driver_id', 'LIKE', '%' . $value . "%")->orderBy('id', 'desc')->get();
                    foreach ($transportations_Values as $v) {
                        $transportations_all[] = $v;
                    }
                }
                return view('transportations.search', compact('transportations_all'))->render();
            } else {
                $transportations_alls = DB::table('transportation_requests')->orderBy('id', 'desc')->paginate(10);
                return view('transportations.searchEmpty', compact('transportations_alls'))->render();
            }
        }
    }

    public function SearchDate(Request $request)
    {
        if ($request->ajax()) {
            $transportations_all = Order::whereBetween('created_at', [$request->start, $request->end])->orderBy('id', 'desc')->get();
            if ($transportations_all->isEmpty()) {
                $transportations_alls = [];
                return view('transportations.searchEmpty', compact('transportations_alls'))->render();
            } else {
                return view('transportations.search', compact('transportations_all'))->render();
            }
        }
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, Order $transportation)
    {

        if ($request->ajax()) {
            $order = Order::find($request->id);
            $governorate = getGovernorateByid($order->governorate);
            $city = getCiteByid($order->city)->name;
            if (!User::find($order->user_id)) {
                $driver = "";
            } else {
                $driver = User::find($order->user_id)->full_name;
            }

            $status = Select($order->status);
            if (!User::find($order->assigned_status)) {
                $assigned_status = "";
            } else {
                $assigned_status = User::find($order->assigned_status)->full_name;
            }
            if (!User::find($order->assigned_driver)) {
                $assigned_driver = "";
            } else {
                $assigned_driver = User::find($order->assigned_driver)->full_name;
            }
            $payment_status = payment_status($order->payment_status);
            return response()->json(['order' => $order, 'governorate' => $governorate, 'city' => $city, 'driver' => $driver, 'status' => $status, 'assigned_status' => $assigned_status, 'assigned_driver' => $assigned_driver, 'payment_status' => $payment_status]);
        }

    }

    public function edit(Order $transportation)
    {
        //
    }

    public function update(Request $request, Order $transportation)
    {
        //
    }

    public function destroy(Order $transportation)
    {
        //
    }

    public function changeStatus(Request $request)
    {

        $order = Order::find($request->id);
        if ($order->status == 1 || $order->status == 4) {
            return response()->json(['error' => $order]);
        } else {
            $order->status = $request->value;
            $order->assigned_status = Auth::user()->id;
            $order->save();
            return response()->json(['success' => $order]);
        }

    }

    public function changeUserOrder(Request $request)
    {

        $order = Order::find($request->id);
        if ($order->status == 1 || $order->status == 4) {
            return response()->json(['error' => $order]);
        } else {
            $order->user_id = $request->value;
            $order->assigned_driver = Auth::user()->id;
            $order->save();
            return response()->json(['success' => $order]);
        }

    }

    public function delivery_date(Request $request)
    {

        $order = Order::query()->where('id', '=', $request->id)->get()->first();
        if ($order->status == 1 || $order->status == 4) {
            return response()->json(['error' => $order]);
        } else {
            $order->delivery_date = $request->value;
            $order->save();
            return response()->json(['success' => $order]);
        }

    }

    public function downloadPdf(Request $request)
    {
        if ($request->start == null && $request->end == null) {
//            $pd = Order::all();
            $city = $request->city;
            $paymentStatus = $request->payment_status;
            $orderStatus = $request->order_status;
            $driverName = $request->driver;
            $pd = Order::where(function ($query) use ($city) {
                if ($city) {
                    $query->where('city', $city);
                }
            })
                ->where(function ($query) use ($paymentStatus) {
                    if ($paymentStatus) {
                        $query->where('payment_status', $paymentStatus);
                    }
                })
                ->where(function ($query) use ($orderStatus) {
                    if ($orderStatus) {
                        $query->where('status', $orderStatus);
                    }
                })
                ->where(function ($query) use ($driverName) {
                    if ($driverName) {
                        $query->where('user_id', $driverName);
                    }
                })
                ->get();
            $pdf = PDF::loadView('orders.pdf', compact('pd'));
            return $pdf->download('Orders.pdf');
        } elseif ($request->start !== null && $request->end !== null) {
//            $pd = DB::table('orders')->whereBetween('created_at', [$request->start, $request->end])->get();
            $city = $request->city;
            $paymentStatus = $request->payment_status;
            $orderStatus = $request->order_status;
            $driverName = $request->driver;
            $pd = DB::table('orders')->whereBetween('created_at', [$request->start, $request->end])->where(function ($query) use ($city) {
                if ($city) {
                    $query->where('city', $city);
                }
            })
                ->where(function ($query) use ($paymentStatus) {
                    if ($paymentStatus) {
                        $query->where('payment_status', $paymentStatus);
                    }
                })
                ->where(function ($query) use ($orderStatus) {
                    if ($orderStatus) {
                        $query->where('status', $orderStatus);
                    }
                })
                ->where(function ($query) use ($driverName) {
                    if ($driverName) {
                        $query->where('user_id', $driverName);
                    }
                })
                ->get();
            $pdf = PDF::loadView('orders.pdf', compact('pd'));
            return $pdf->download('Orders.pdf');
        }

    }

    public function downloadPdfByid(Request $request, $id)
    {
        $pd = Order::query()->find($id);
        $pdf = PDF::loadView('orders.printOrder', compact('pd'));
        return $pdf->download('Orders.printOrder');
    }

    public function downloadExcel(Request $request)
    {
        if ($request->start == null && $request->end == null) {
            $pd = Order::all();
            $start = $request->start;
            $end = $request->end;
            return Excel::download(new OrdersExport($start, $end), 'Orders.xlsx');
        } elseif ($request->start !== null && $request->end !== null) {
            $start = $request->start;
            $end = $request->end;
            return Excel::download(new OrdersBetweenExport($start, $end), 'Orders.xlsx');
        }

    }

    public function filter_orders(Request $request)
    {
        if ($request->ajax()) {
            $city = $request->city;
            $paymentStatus = $request->payment_status;
            $orderStatus = $request->order_status;
            $driverName = $request->driver;
            $orders = Order::where(function ($query) use ($city) {
                if ($city) {
                    $query->where('city', $city);
                }
            })
                ->where(function ($query) use ($paymentStatus) {
                    if ($paymentStatus) {
                        $query->where('payment_status', $paymentStatus);
                    }
                })
                ->where(function ($query) use ($orderStatus) {
                    if ($orderStatus) {
                        $query->where('status', $orderStatus);
                    }
                })
                ->where(function ($query) use ($driverName) {
                    if ($driverName) {
                        $query->where('user_id', $driverName);
                    }
                })
                ->get();
            return Datatables::of($orders)->addIndexColumn()
                ->editColumn('order_number', function ($orders) {
                    return $orders->order_number;
                })
                ->editColumn('name', function ($orders) {
                    return $orders->name;
                })
                ->editColumn('email', function ($orders) {
                    return $orders->email;
                })
                ->editColumn('city', function ($orders) {
                    $data = Lookups::query()->where('fk_relationships', '=', 1)->first('name');
                    return $data->name;
                })
                ->editColumn('status', function ($orders) {
                    $select = '<select style="height: auto;line-height: 14px;width:170px;" class="form-select form-control-solid cc" id="' . $orders->id . '" ' . disableSelect($orders->status) . ' onchange="ChangeSelect(this)">';
                    foreach (Order::STATUS as $status) {
                        $select = $select . '<option ' . disableOption($status) . ' value="' . $status . '" ' . selected($status, $orders->status) . '>' . Select($status) . '</option>';
                    }
                    return $select . '</select>';
                })
                ->editColumn('assign_driver', function ($orders) {
                    $select = '<select style="height: auto;line-height: 14px;width:170px;" class="form-select form-control-solid dd" id="' . $orders->id . '" ' . disableSelectDriver($orders->status) . ' onchange="ChangeSelectUser(this)"><option></option>';
                    foreach (User::where('user_type', 1)->get() as $user) {
                        $select = $select . '<option value="' . $user->id . '" ' . selectedUser($user->id, $orders->user_id) . '>' . $user->full_name . '</option>';
                    }
                    return $select . '</select>';
                })
                ->editColumn('delivery_date', function ($orders) {
                    return '<input style="height: 34px;width:170px;" class="form-select form-control-solid dd" value="' . $orders->delivery_date . '" type="date" id="' . $orders->id . '" onchange="delivery_date(this)" ' . disableSelectDriver($orders->status) . '></option>';
                })
                ->editColumn('payment_status', function ($orders) {
                    return payment_status($orders->payment_status);
                })
                ->editColumn('actions', function ($orders) {
                    $action = '<button id="show" data-id="' . $orders->id . '" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_show_orders">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
                                                                    </svg>
																</span>
                                    <!--end::Svg Icon-->
                                </button>';
                    return $action;
                })
                ->rawColumns(['order_number'], ['name'], ['email'],
                    ['governorate'], ['city'], ['pieces_number'], ['avenue'], ['street'], ['building_number'], ['floor'], ['status'], ['payment_status'])
                ->escapeColumns(['order_number' => 'order_number'], ['name' => 'name'], ['phone_number' => 'phone_number']
                    , ['email' => 'email'], ['governorate' => 'governorate'], ['city' => 'city']
                    , ['pieces_number' => 'pieces_number'], ['avenue' => 'avenue'], ['street' => 'street'], ['building_number' => 'building_number']
                    , ['floor' => 'floor'], ['status' => 'status'], ['payment_status' => 'payment_status'])
                ->make(true);
        }
    }


}
