<?php


use App\Models\Permission;
use App\Models\RolesPermission;
use App\Models\User;
use App\Services\FCMService;

function get_permission_by_name($name)
{
    $permission = Permission::query()->where("name", $name)->where("status", 1)->get()->first();
    return $permission;
}

function get_role_permission_checked($role_id, $permission_id)
{
    $data = RolesPermission::query()->where("role_id", $role_id)->where("permission_id", $permission_id)->get()->first();
    return $data;
}

function firebaseNotification($fcmNotification)
{
    $fcmUrl =config('firebase.fcm_url');

    $apiKey=config('firebase.fcm_api_key');

    $http=\Illuminate\Support\Facades\Http::withHeaders([
        'Authorization:key'=>$apiKey,
        'Content-Type'=>'application/json'
    ])  ->post($fcmUrl,$fcmNotification);

    return  $http->json();

}

function getUserName($id){
    $user = User::query()->find($id);
    return $user->full_name;
}

function getGovernorate(){
    $governorate = \App\Models\Lookups::query()->where('s_key','=','Governorate')->get();
    return $governorate;
}

function getCite(){
    $city = \App\Models\Lookups::query()->where('s_key','=','City')->get();
    return $city;
}
function payment_status($value){
    if ($value == 0){
        return trans('web.Unpaid');
    }
    return  trans('web.paid');
}

function order_status($value){
    if ($value == 1){
        return trans('web.new request');
    }
}



