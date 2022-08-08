<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        $order = Order::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'products' => json_encode($data['products']),
            'total_price' => $data['total_price'],
        ]);
        return $order ? response('ok', 200) : response('Произошла ошибка', 500);
    }
}
