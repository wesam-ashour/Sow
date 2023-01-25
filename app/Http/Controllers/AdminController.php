<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AdminPermissions;
use App\Models\AdminRoles;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:admins_view|admins_create|admins_edit']);
    }
    public function index(Request $request)
    {
        $roles = Role::query()->get();
        if ($request->ajax()) {
            $data = User::query()->orderBy('id', 'DESC')->where('id', '!=', 1)->where('user_type', '=', 0)->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('full_name', function ($data) {
                    return '
                                <div class="d-flex flex-column">
                                    <a class="text-gray-800 text-hover-primary mb-1">' . $data->full_name . '</a>
                                    <span>' . $data->email . '</span>
                                </div>';
                })->editColumn('status', function ($data) {
                    if (Auth::user()->hasPermissionTo('admins_edit')) {
                        if ($data->user_status == 1) {
                            $status = '<div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input checkBox" name="toggle[' . $data->id . ']" id="' . $data->id . '"  type="checkbox" value="' . $data->id . '" id="flexSwitchChecked" onclick="getStatusAdmins(this)"  checked />
                            <label class="form-check-label" for="flexSwitchChecked">
                            </label>
                                </div>';
                        } else {
                            $status = '<div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input checkBox" name="toggle[' . $data->id . ']" id="' . $data->id . '"  type="checkbox" value="' . $data->id . '" id="flexSwitchChecked"  onclick="getStatusAdmins(this)" />
                            <label class="form-check-label" for="flexSwitchChecked">
                            </label>
                                </div>';
                        }
                        return $status;
                    }else{
                        if ($data->status == 1){
                            return trans('web.active');
                        }else{
                            return trans('web.inactive');
                        }
                    }
                })->editColumn('role', function ($data) {
                    if (count($data->getRoleNames()) > 0)
                        return '<div class="badge badge-light-primary" style="font-size: 15px;">' . $data->getRoleNames()->implode(', ') . '</div>';
                    else
                        return 'no roles';
                })->editColumn('created_at', function ($data) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans();
                })->editColumn('mobile_number', function ($data) {
                    return $data->mobile_number;
                })
                ->editColumn('others', function ($data) {
                    if (Auth::user()->hasPermissionTo('admins_edit')) {
                        $actions = '
                    <a href="' . url('admin/edit/' . $data->id) . '">
                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor" />
																		<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->
                                </button>
                                </a>
                                   <button id="delete" data-id="' . $data->id . '" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
																		<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
																		<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->
                                </button><!--end::Update-->
                                ';

                        return $actions;
                    }
                })
                ->rawColumns(['others'])
                ->escapeColumns([])
                ->make(true);
        }
        return view('admin-management.Admins.admins_list', compact('roles'));

    }

    public function edit($id)
    {
        $user = User::query()->find($id);
        $roles = Role::query()->get();
        return view('admin-management.Admins.admins_edit', compact('user', 'roles'));
    }

    public function profile()
    {
        $user = User::query()->find(auth()->user()->id);
        $roles = Role::query()->get();
        return view('admin-management.Admins.profile', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
//            dd($request->input());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|string|unique:users,email',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8',
                'roles_id' => 'required',
                'roles_name' => 'required',
            ], [
                'name.required' => trans("web.required"),
                'name.string' => trans("web.string"),
                'name.max' => trans("web.max"),

                'email.required' => trans("web.required"),
                'email.email' => trans("web.email"),
                'email.max' => trans("web.max"),
                'email.unique' => trans("web.unique"),
                'email.regex' => trans("web.regex"),

                'password.min' => trans("web.min"),
                'password.same' => trans("web.same"),
                'password.required_with' => trans("web.required_with"),
                'password_confirmation.min' => trans("web.min"),

                'roles_id.required' => trans("web.required"),
                'roles_name.required' => trans("web.required"),


            ]);
            if ($validator->passes()) {
                $data = new User();
                $data->full_name = $request->name;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->user_type = 0;
                $data->user_status = 1;
                $data->roles_id = $request->roles_id;
                $data->roles_name = $request->roles_name;
                $data->created_at = Carbon::now();
                $data->updated_at = Carbon::now();
                $data->save();
                $data->assignRole($request->roles_id);
                $role = Role::query()->find($request->roles_id);
                foreach ($role->role_permissions as $permission) {
                    $user_permi = new AdminPermissions();
                    $user_permi->permission_id = $permission->permission_id;
                    $user_permi->model_type = "App\Models\User";
                    $user_permi->model_id = $data->id;
                    $user_permi->save();
                }
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function update(Request $request, $id)
    {

        if ($request->ajax()) {
//            dd($request->input());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:users,email,' . $id,
                'password' => $request->password != null ? 'min:8|required_with:password_confirmation|same:password_confirmation' : '',
                'password_confirmation' => $request->password_confirmation != null ? 'min:8' : '',
                'roles_id' => 'required',
                'roles_name' => 'required',
            ], [
                'name.required' => trans("web.required"),
                'name.string' => trans("web.string"),
                'name.max' => trans("web.max"),

                'email.required' => trans("web.required"),
                'email.email' => trans("web.email"),
                'email.max' => trans("web.max"),
                'email.unique' => trans("web.unique"),
                'email.regex' => trans("web.regex"),

                'password.min' => trans("web.min"),
                'password.same' => trans("web.same"),
                'password.required_with' => trans("web.required_with"),
                'password_confirmation.min' => trans("web.min"),

                'roles_id.required' => trans("web.required"),
                'roles_name.required' => trans("web.required"),
            ]);
            if ($validator->passes()) {
                $data = User::query()->find($id);
                $data->full_name = $request->name;
                $data->email = $request->email;
                $data->user_type = 0;
                $data->roles_id = $request->roles_id;
                $data->updated_at = Carbon::now();
                if ($request->password) {
                    $data->password = Hash::make($request->password);
                }
                $data->save();
                $old_roles = AdminRoles::query()->where("model_id", $id)->delete();
                $old_permissions = AdminPermissions::query()->where("model_id", $id)->delete();
                $role = Role::query()->find($request->roles_id);
                $data->assignRole($request->roles_id);
                foreach ($role->role_permissions as $permission) {
                    $user_permi = new AdminPermissions();
                    $user_permi->permission_id = $permission->permission_id;
                    $user_permi->model_type = "App\Models\User";
                    $user_permi->model_id = $id;
                    $user_permi->save();
                }
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }

    }

    public function updateProfile(Request $request, $id)
    {

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:users,email,' . $id,
                'password' => $request->password != null ? 'min:8|required_with:password_confirmation|same:password_confirmation' : '',
                'password_confirmation' => $request->password_confirmation != null && $request->password != null ? 'min:8' : '',
            ], [
                'name.required' => trans("web.required"),
                'name.string' => trans("web.string"),
                'name.max' => trans("web.max"),

                'email.required' => trans("web.required"),
                'email.email' => trans("web.email"),
                'email.max' => trans("web.max"),
                'email.unique' => trans("web.unique"),
                'email.regex' => trans("web.regex"),

                'password.min' => trans("web.min"),
                'password.same' => trans("web.same"),
                'password.required_with' => trans("web.required_with"),
                'password_confirmation.min' => trans("web.min"),
            ]);
            if ($validator->passes()) {
                $data = User::query()->find($id);
                $data->full_name = $request->name;
                $data->email = $request->email;
                $data->user_status = 1;
                $data->roles_id = $request->roles_id;
                $data->updated_at = Carbon::now();
                if ($request->password) {
                    $data->password = Hash::make($request->password);
                }
                $data->save();
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }

    }

    public function destroy($id)
    {
        $data = User::query()->find($id)->delete();
        if ($data)
            return response()->json(['success' => 'success']);
        else
            return response()->json(['error' => 'error']);
    }


}
