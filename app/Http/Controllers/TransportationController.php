<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransportationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:transportations_view']);
    }

    public function index(Request $request)
    {
        $transportations_all = Order::query()->latest();
        if ($request->ajax()) {
            return Datatables::of($transportations_all)->addIndexColumn()
                ->addColumn('order_number', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->order_number . '</a>';
                })
                ->addColumn('name', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->name . '</a>';
                })
                ->addColumn('phone_number', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->phone_number . '</a>';
                })
                ->addColumn('email', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->email . '</a>';
                })
                ->addColumn('governorate', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->governorate . '</a>';
                })
                ->addColumn('city', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->city . '</a>';
                })
                ->addColumn('pieces_number', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->block . '</a>';
                })
                ->addColumn('avenue', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->jadda . '</a>';
                })
                ->addColumn('street', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->street . '</a>';
                })
                ->addColumn('building_number', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->house . '</a>';
                })
                ->addColumn('floor', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $transportations_all->floor . '</a>';
                })
                ->addColumn('status', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . order_status($transportations_all->status) . '</a>';
                })
                ->addColumn('payment_status', function ($transportations_all) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . payment_status($transportations_all->payment_status)  . '</a>';
                })
                ->rawColumns(['order_number'], ['name'], ['phone_number'], ['email'],
                    ['governorate'], ['city'], ['pieces_number'], ['avenue'], ['street'], ['building_number'], ['floor'], ['status'], ['payment_status'])
                ->escapeColumns(['order_number' => 'order_number'], ['name' => 'name'], ['phone_number' => 'phone_number']
                    , ['email' => 'email'], ['governorate' => 'governorate'], ['city' => 'city']
                    , ['pieces_number' => 'pieces_number'], ['avenue' => 'avenue'], ['street' => 'street'], ['building_number' => 'building_number']
                    , ['floor' => 'floor'], ['status' => 'status'], ['payment_status' => 'payment_status'])
                ->make(true);
        }
        return view('orders.index');
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
            }else{
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
            $activity = Order::find($transportation->id);
            return response()->json($activity->complaint);
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


}
