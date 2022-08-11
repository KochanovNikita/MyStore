<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Filters\OrderFilter;
use App\Http\Requests\Admin\Filter\OrderFilterRequst;
use App\Models\Order;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(OrderFilterRequst $request)
    {
        $data = $request->validated();
        $filter = app()->make(OrderFilter::class, ['queryParams' => array_filter($data)]);
        $orders = Order::filter($filter)->paginate(40)->withQueryString();
        return view('admin.order.index', compact('orders'));
    }
}
