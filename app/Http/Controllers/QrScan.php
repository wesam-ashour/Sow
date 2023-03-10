<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class QrScan extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ScanQR']);
    }
    public function index(){
        /*.*/
        $drivers = User::query()->where('user_type', '=', 1)->get()->all();
        return view('scanQr.index',compact('drivers'));
    }

    public function handleScan(Request $request){
        $order = Order::where('order_number',$request->scan)->get()->first();
        if ($order){
            if ($order->status == 1){
                if ($order->payment_status == 2) {
                    $order->status = 2;
                    $order->user_id = Auth::user()->id;
                    $order->assigned_status = Auth::user()->id;
                    if ($request->driver_id)
                        $order->assigned_driver = $request->driver_id;
                    $order->delivery_date = $request->delivery_date;
                    $order->save();
                    return response()->json(['success' => 'Order status changed successfully']);
                }else{
                    return response()->json(['unpaid' => 'Order unpaid yet!']);
                }
            }else{
                $user = User::find($order->user_id)->full_name;
                $response = trans('web.The order of the request has already changed by ') . $user;
                return response()->json(['done' => $response]);
            }
        }else{
            return response()->json(['error' => 'The order not found!']);
        }

    }
}
