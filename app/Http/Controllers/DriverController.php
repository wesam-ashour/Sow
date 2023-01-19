<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    //

    public function index(Request $request){

        $driver = User::query()->where('user_type','=',1)->get()->all();
        if ($request->ajax()) {
            return Datatables::of($driver)->addIndexColumn()
                ->addColumn('full_name', function ($driver) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $driver->full_name . '</a>';
                })
                ->addColumn('email', function ($driver) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $driver->email . '</a>';
                })
                ->addColumn('mobile_number', function ($driver) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $driver->mobile_number . '</a>';
                })
                ->addColumn('address', function ($driver) {
                    return '<a  class="text-gray-900 fw-bolder text-hover-primary mb-1 text-center">' . $driver->address . '</a>';
                })

                ->rawColumns(['full_name'], ['email'], ['mobile_number'], ['address'])
                ->escapeColumns(['full_name' => 'full_name'], ['email' => 'email'], ['mobile_number' => 'mobile_number']
                    , ['address' => 'address'])
                ->make(true);
        }

        return view('drivers.index');
    }

    public function store(Request $request){

        $driver = new User();

        $driver->full_name = $request->full_name;
        $driver->email = $request->email;
        $driver->mobile_number = $request->phone_number;
        $driver->address = $request->address;
        $driver->user_type = 1;
        $driver->save();


    }
}
