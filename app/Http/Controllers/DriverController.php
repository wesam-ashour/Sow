<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:drivers']);
    }

    public function index(Request $request){

        $driver = User::query()->where('user_type','=',1)->get()->all();
        if ($request->ajax()) {
            return Datatables::of($driver)->addIndexColumn()
                ->addColumn('full_name', function ($driver) {
                    return $driver->full_name;
                })
                ->addColumn('email', function ($driver) {
                    return  $driver->email;
                })
                ->addColumn('mobile_number', function ($driver) {
                    return $driver->mobile_number;
                })
                ->addColumn('address', function ($driver) {
                    return $driver->address;
                })
                ->addColumn('action', function ($driver) {
                    $action = '<div class="text-start">
                            <div class="btn-group dropstart text-center">
                                  <button type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="svg-icon svg-icon-5 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                      height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                      fill="black"/>
									</svg>
									</span>' . trans("web.action") . '
                                  </button>
                                  <div class="dropdown-menu">';
                    if (auth()->guard("web")->user()->can('drivers_edit'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a id="edit_driver" data-id="' . $driver->id . '"
                                             data-name="' . $driver->name . '" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_driver" class="menu-link px-3">' . trans("web.Edit") . '</a>
                                        </div>';
                    if (auth()->guard("web")->user()->can('drivers_delete'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a id="edit_delete" href="#" data-id="' . $driver->id . '" data-name="' . $driver->name . '" class="menu-link px-3">' . trans("web.Delete") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['full_name'], ['email'], ['mobile_number'], ['address'],['action'])
                ->escapeColumns(['full_name' => 'full_name'], ['email' => 'email'], ['mobile_number' => 'mobile_number']
                    , ['address' => 'address'], ['action' => 'action'])
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

    public function edit(Request $request , $id)
    {

        if ($request->ajax()) {
            $driver = User::query()->get()->find($id);
            return response()->json($driver);
        }
    }
    public function update(Request $request){
        $driver = User::query()->find($request->edit_id);

        $driver->full_name = $request->edit_full_name;
        $driver->email = $request->edit_email;
        $driver->mobile_number = $request->edit_phone_number;
        $driver->address = $request->edit_address;
        $driver->user_type = 1;
        $driver->save();
    }

    public function destroy($id){
        $driver = User::find($id)->delete();
        return response()->json(['success' => $driver]);

    }
    public function changeStatus(Request $request)
    {
        if ($request->ajax()){
            $data = User::find($request->id);
            if ($request->isChecked == "true"){
                $data->user_status = 1;
                $data->save();
            }else{
                $data->user_status = 2;
                $data->save();
            }
            return response()->json('success');
        }
    }
}
