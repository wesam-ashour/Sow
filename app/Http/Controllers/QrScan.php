<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class QrScan extends Controller
{

    public function index(){
       return view('scanQr.index');
    }

    public function handleScan(Request $request){
        /*$code = $request->code.;
        $order = Order::query()->where('order_number' ,'=',$code)->get()->first();
        $code = $request->code;
        $order = Order::query()->where('order_number' ,'=',$code)->get()->first();
        if ($order){
        $order->status = 2;
        $order->save();
        return back()->with('success', 'تم مسح الرمز بنجاح');
        }
        else{
            return back()->with('success', 'لايوجد طلب مخزن لهذا العنصر');

        }
      */
      dd('scan done'.$request->code);


    }
}
