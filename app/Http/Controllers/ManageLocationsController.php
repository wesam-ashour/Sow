<?php

namespace App\Http\Controllers;

use App\Models\Lookups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ManageLocationsController extends Controller
{

    public function index(Request $request){
        $locations = Lookups::all();

        if ($request->ajax()) {
            return Datatables::of($locations)->addIndexColumn()
                ->editColumn('name', function ($locations) {
                    return $locations->name;
                })
                ->editColumn('s_key', function ($locations) {
                   if ($locations->s_key == "Governorate"){
                       return trans('web.Governorate');
                   }else{
                       return trans('web.City');
                   }
                })
                ->editColumn('fk_relationships', function ($locations) {
                    if ($locations->s_key == "Governorate"){
                        return '----';
                    }else{
                        return getGovernorateByid($locations->fk_relationships);
                    }

                })
                ->editColumn('price', function ($locations) {
                    if ($locations->price){
                        return $locations->price;
                    }else{
                        return trans('web.nothing');
                    }
                })
                ->addColumn('actions', function ($locations) {
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

                    $action = $action . '<div class="menu-item px-3">
                                            <a id="edit" data-id="' . $locations->id . '"
                                             data-name="' . $locations->name . '" data-bs-toggle="modal" data-bs-target="#kt_modal_update_location" class="menu-link px-3">' . trans("web.Edit") . '</a>
                                        </div>';
                    $action = $action . '<div class="menu-item px-3">
                                            <a id="delete" href="#" data-id="' . $locations->id . '" data-name="' . $locations->name . '" class="menu-link px-3">' . trans("web.Delete") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['name'], ['s_key'],['action'])
                ->escapeColumns(['name' => 'name'], ['s_key' => 's_key'], ['action' => 'action'])
                ->make(true);
        }
        return view('locations.index');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => $request->type == "City" ? 'required|numeric' : '',
            'governorate_fk_city' => $request->type == "City" ? 'required' : '',
        ], [
            'name.required' => trans("web.required"),
            'name.string' => trans("web.string"),
            'name.max' => trans("web.max"),
            'type.required' => trans("web.required"),
            'type.string' => trans("web.string"),
            'type.max' => trans("web.max"),
            'price.required' => trans("web.required"),
            'price.numeric' => trans("web.numeric"),
            'governorate_fk_city.required' => trans("web.required"),
        ]);
        if ($validator->passes()) {
            $data = new Lookups();
            $data->name = $request->name;
            $data->s_key = $request->type;
            $data->fk_relationships = $request->governorate_fk_city;
            $data->price = $request->price;
            $data->save();
            return response()->json(['success' => $data]);
        }
        return response()->json(['error' => $validator->errors()->toArray()]);

    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $lookup = Lookups::find($id);
            return response()->json($lookup);
        }
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required|string|max:255',
            'type_edit' => 'required|string|max:255',
            'price_edit' => $request->type_edit == "City" ? 'required|numeric' : '',
        ], [
            'name_edit.required' => trans("web.required"),
            'name_edit.string' => trans("web.string"),
            'name_edit.max' => trans("web.max"),
            'type_edit.required' => trans("web.required"),
            'type_edit.string' => trans("web.string"),
            'type_edit.max' => trans("web.max"),
            'price_edit.required' => trans("web.required"),
            'price_edit.numeric' => trans("web.numeric"),
        ]);
        if ($validator->passes()) {
            $data = Lookups::find($id);
            $data->name = $request->name_edit;
            $data->s_key = $request->type_edit;
            $data->price = $request->price_edit;
            $data->save();
            return response()->json(['success' => $data]);
        }
        return response()->json(['error' => $validator->errors()->toArray()]);
    }

    public function destroy($id)
    {
        $lookup = Lookups::find($id)->delete();
        return response()->json(['success' => $lookup]);
    }
}
