@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления заказом: #{{$order->id}}
    </x-content-header>
@endsection

@section('content')
    <div class="col-12 ">
        <div class="card col mb-3">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{ $order->id }}</th>
                        </tr>
                        <tr>
                            <th>Покупатель</th>
                            <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                            <th>Адрес</th>
                            <th>{{ $order->address }}</th>
                        </tr>
                        <tr>
                            <th>Номер телефона</th>
                            <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                            <th>Статус</th>
                            <th>
                                <form
                                action="{{route('admin.order.update', $order)}}"
                                method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group w-25">
                                        @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <select class="form-control select2"
                                        name="status"
                                        id="DropdownGroups"
                                        style="width: 100%;">
                                          @foreach ($statuses as $id => $status)
                                            <option id="status{{$id}}"
                                            {{ $id == $order->status ? 'selected' : ''}}
                                            value="{{$id}}">{{$status}}</option>
                                          @endforeach
                                        </select>
                                        <button class="btn btn-primary mx-2">Сменить статус</button>
                                      </div>

                                </form>
                            </th>
                      </tr>
                        <tr>
                            <th>Время оформления</th>
                            <th>{{ $order->created_at_carbon }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card col-12 mb-3">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID товара</th>
                            <th>Наименование</th>
                            <th>Количество</th>
                            <th>Цена за штуку</th>
                            <th>Сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_products as $product)
                            <tr>
                                <th>{{ $product->id}}</th>
                                <th>
                                    <a href="{{route('admin.product.show',$product->id)}}">
                                        {{ $product->product->title}}
                                    </a>
                                </th>
                                <th>{{ $product->quantity}}</th>
                                <th>{{ $product->price}} BYN</th>
                                <th>{{ $product->total_price}} BYN</th>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="4">
                                <h3>Итог:</h3>
                            </th>
                            <th>
                                <h3>{{$order->total_price}} BYN</h3>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
