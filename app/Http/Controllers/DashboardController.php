<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all()->where('user_type','=',0)->count();
        $drivers = User::all()->where('user_type','==',1)->count();

        return view('dashboard',compact('users','drivers'));
    }

    public function statistics(Request $request){
        if ($request->ajax()){
            $requested = DB::table('transportation_requests')->orderBy('created_at', 'ASC')->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });
            $accepted = DB::table('transportation_requests')->orderBy('created_at', 'ASC')->where('status', 4)->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });
            $rejected = DB::table('transportation_requests')->orderBy('created_at', 'ASC')->where('status', 5)->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });


            $historyRequested = [];
            $countRequested = [];
            foreach ($requested as $days => $values) {
                $historyRequested[] = $days;
                $countRequested[] = count($values);
            }

            $countAccepted = [];
            foreach ($accepted as $values) {
                $countAccepted[] = count($values);
            }

            $countRejected = [];
            foreach ($rejected as $values) {
                $countRejected[] = count($values);
            }

            return response(['historyRequested' => $historyRequested, 'countRequested' => $countRequested,'countAccepted' => $countAccepted,'countRejected' => $countRejected]);

        }
    }

    public function SearchDateStatistics(Request $request)
    {
        if ($request->ajax()) {
            $requested = DB::table('transportation_requests')->whereBetween('created_at', [$request->start, $request->end])->orderBy('created_at', 'ASC')->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });
            $accepted = DB::table('transportation_requests')->whereBetween('created_at', [$request->start, $request->end])->orderBy('created_at', 'ASC')->where('status', 4)->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });
            $rejected = DB::table('transportation_requests')->whereBetween('created_at', [$request->start, $request->end])->orderBy('created_at', 'ASC')->where('status', 5)->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('d-m');
            });


            $historyRequested = [];
            $countRequested = [];
            foreach ($requested as $days => $values) {
                $historyRequested[] = $days;
                $countRequested[] = count($values);
            }

            $countAccepted = [];
            foreach ($accepted as $values) {
                $countAccepted[] = count($values);
            }

            $countRejected = [];
            foreach ($rejected as $values) {
                $countRejected[] = count($values);
            }

            return response(['historyRequested' => $historyRequested, 'countRequested' => $countRequested,'countAccepted' => $countAccepted,'countRejected' => $countRejected]);

        }
    }

}
