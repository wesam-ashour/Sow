<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersBetweenExport implements FromView
{
    use \Maatwebsite\Excel\Concerns\Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    private $start;
    private $end;

    public function __construct($start,$end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $orders = DB::table('orders')->whereBetween('created_at', [$this->start, $this->end])->get();
        return view('orders.excelAll', [
            'orders' => $orders,
        ]);
    }
}
