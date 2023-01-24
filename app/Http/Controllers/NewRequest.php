<?php

namespace App\Http\Controllers;

use App\Models\Lookups;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewRequest extends Controller
{
    public function index(Request $request,$order_number){
        $name = request()->input('name');
        $phone = request()->input('phone');
        $email = request()->input('email');
        $address = request()->input('address');
        $house = request()->input('house');
        $jadda = request()->input('jadda');
        $street = request()->input('street');
        $block = request()->input('block');
        $city = request()->input('city');
        $floor = request()->input('floor');

        $check_order = Order::query()->where('order_number' , '=' , $order_number)->get()->first();
        return view('new_request',compact('order_number','name','phone','email','address','house','jadda','street','block','city','check_order','floor'));
    }
    public function index2(){
        $order_number = null;
        return view('new_request',compact('order_number'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'block' => 'required',
            'jadda' => 'required',
            'house' => 'required',
            'street' => 'required',
            'floor' => 'required',
            'governorate' => 'required',
            'city' => 'required',
        ], [
            'order_number.required' => trans("web.required"),
            'name.required' => trans("web.required"),
            'phone.required' => trans("web.required"),
            'email.required' => trans("web.required"),
            'block.required' => trans("web.required"),
            'jadda.required' => trans("web.required"),
            'house.required' => trans("web.required"),
            'street.required' => trans("web.required"),
            'floor.required' => trans("web.required"),
            'governorate.required' => trans("web.required"),
            'city.required' => trans("web.required"),
        ]);

        if($validator->passes()){
            $order = Order::query()->where('order_number' , '=' , $request->order_number)->get()->first();
            if (!$order){
                $order = new Order();
            }
        $order->order_number = $request->order_number;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->governorate = $request->governorate;
        $order->city = $request->city;
        $order->block = $request->block;
        $order->jadda = $request->jadda;
        $order->street = $request->street;
        $order->house = $request->house;
        $order->floor = $request->floor;
        $order->status = 1;
        $order->payment_status = 0;
        $order->save();

        $total = Lookups::where('id',$request->city)->get()->first();

        $request_data = array(
            'merchant_id' => '1201',
            'username' => 'test',
            'password' => stripslashes('test'),
            'api_key' => 'jtest123', // in sandbox request
            //'api_key' =>password_hash('API_KEY',PASSWORD_BCRYPT), //In production mode, please pass API_KEY with BCRYPT function
            'order_id' => time(), // MIN 30 characters with strong unique function (like hashing function with time)
            'total_price' => $total->price,
            'CurrencyCode' => 'KWD',//only works in production mode
            //'CurrencyCode'=>'KWD',//'KWD','SAR','USD','BHD','EUR','OMR','QAR','AED' and others,Please ask our support to activate
            'CstFName' => 'Test Name',
            'CstEmail' => 'test@test.com',
            'CstMobile' => '12345678',
            'test_mode' => 1, // test mode enabled
            'payment_gateway' => 'knet',// only works in production mod
            'ProductName' => json_encode(['computer', 'television']),
            'ProductQty' => json_encode([2, 1]),
            'ProductPrice' => json_encode([150, 1500]),
            'reference' => 'Ref00001',
            'success_url'=> env('APP_URL').'/receive/response/'.$order->id,
            'error_url'=> env('APP_URL').'/receive/response/'.$order->id,
            'notifyURL'=> env('APP_URL').'/receive/response/'.$order->id,
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.upayments.com/test-payment",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($request_data),
            CURLOPT_HTTPHEADER => array(
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return redirect()->intended(json_decode($response)->paymentURL);
        }else{
            return back()->withErrors($validator->errors())->withInput();


        }
    }

    public function response(Request $request,$id){
        if ($request->Result == "CAPTURED"){
            $order = Order::find($id);
            $order->payment_status = 2;
            $order->date_payment = now();
            $order->TrackID = $request->TrackID;
            $order->PaymentID = $request->PaymentID;
            $order->save();
            return redirect()->route('new-request', [$id])->with('success','New payment done');

        }else{
            $order = Order::find($id);
            $order->payment_status = 3;
            $order->date_payment = "";
            $order->TrackID = $request->TrackID;
            $order->PaymentID = $request->PaymentID;
            $order->save();
            return redirect()->route('new-request', [$id])->with('failed','There is an error');
        }
    }

    public function Cities_within_governorate($governorateId){
            $city = \App\Models\Lookups::query()->where('s_key','=','City')->where('fk_relationships','=',$governorateId)->get();
            return response()->json(['city',$city]);


    }

}
